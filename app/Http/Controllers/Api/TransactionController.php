<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BanksValidation;
use App\Models\Biller;
use App\Models\Maintenance;
use App\Models\Monitoring;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Amp\Iterator\toArray;

class TransactionController extends BaseController
{
    private $bank = []; private $transac = [];
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function index(){

        $data = $this->transaction->eosGetAllTransactions();

        return $this->sendResponse($this->transaction->consolidateByBatchNumberWithPagination($data),
            'Fetch all processed data.');
    }

    public function storeValidation(Request $request){

        $arr = [];
        foreach ($request->tags as $tags){
            $arr[] = [
                $tags['text'],
            ];
        }
        $sortedTags = collect($arr)->collapse();

        $bankValidation = BanksValidation::create([
            'biller_id' => $request->bank['id'],
            'bank_validation' => json_encode($sortedTags),
        ]);

        return response()->json(['message' => 'success.']);
    }

    public function processed($batch_id)
    {
        $selectedIds = explode(",", $batch_id);
        $comparison = new \Atomescrochus\StringSimilarities\Compare();

        $transactions = Transaction::with(['getRemitter', 'getBeneficiary'])->whereIn('eos_batch_id', $selectedIds)->get([
            'id', 'bank_name', 'transaction_type', 'original_currency', 'gross_amount',
            'beneficiary_id', 'remitter_id', 'exchange_rate', 'account_number'
        ])->map(function ($transaction){
            return $transaction;
        });

        $billers = Biller::with(['getBankValidation', 'serviceFee', 'transactionType', 'getProvider'])
            ->get()
            ->map(function ($biller){
                return [
                    "id" => $biller['id'],
                    "name" => $biller['name'],
                    "transaction_type" => $biller['transactionType'],
                    "bankValidation" => $biller['getBankValidation']->bank_validation ?? null,
                    "handlingFee" => $biller['serviceFee'],
                    "provider" => $biller['getProvider']
                ];
            })->filter();

        $firstStep = $billers->map(function ($biller) use ($transactions, $comparison,  ){
            return collect($biller['bankValidation'])->map(function ($validation) use ($transactions, $comparison, $biller){
                return $transactions->map(function ($transaction) use ($comparison ,$validation, $biller){
                    $string1 = $transaction['bank_name'];
                    $string2 = $validation;

                    $comp = $comparison->similarText(strtolower($string1), strtolower($string2));
                    if($comp > 80){
                        return [
                            'biller' => $biller,
                            'transaction' => $transaction
                        ];
                    }
                    return null;
                })->filter();
            })->collapse()->toArray();
        })->filter();

        $secondStep = $firstStep->map(function ($items){
            return collect($items)->groupBy('transaction.original_currency')->map(function ($item) use ($items){
                return $item->map(function ($it){
                    return [
                        $it
                    ];
                });
            })->values();
        })->collapse();

        $oneI = collect($secondStep)->map(function ($items) {
            $collapseData = $items->collapse();
            return $collapseData->map(function ($map){
                if(strtolower($map['transaction']['transaction_type']) !== strtolower($map['biller']['transaction_type']['meta_id'])) {
                   return array_filter($map, function ($values) {
                        return $values;
                    });
                }
                return null;
            })->filter();
        })->toArray();

        $noneOneI = collect($secondStep)->map(function ($items) {
            $collapseData = $items->collapse();
            return  $collapseData->map(function ($map){
                if(strtolower($map['transaction']['transaction_type']) === strtolower($map['biller']['transaction_type']['meta_id'])) {
                    return array_filter($map, function ($values) {
                        return $values;
                    });
                }
                return null;
            })->filter();
        })->toArray();

        $mergedData =  collect($noneOneI)->merge($oneI)->filter();

        $thirdStep = $mergedData->map(function ($items) use (&$bankName){
            $arr = [];
            $mapped = [];
            $getHandlingFee = 0;
            $transactionType = '';
            $currency = [];

            $sum = collect($items)->map(function ($get) use (&$amount){
                return floatval(str_replace(",", "", $get['transaction']['gross_amount']));
            })->sum();

            collect($items)->map(function ($map) use (&$mapped, &$getHandlingFee, &$arr, &$currency){
                $arr[] = $map['biller'];
                $mapped[] = $map['transaction'];
                $currency = $map['transaction']['original_currency'];
                $map['biller']['handlingFee']->map(function ($values) use (&$currency, &$getHandlingFee){
                    $transactionCurrency = explode("-", $values->currency)[1];
                    if($transactionCurrency === $currency){
                        $getHandlingFee =  floatval($values['service_fee']);
                    }
                })->filter();
            });

            collect($mapped)->map(function ($items) use (&$transactionType){
                $transactionType = $items['transaction_type'];
            });

            return [
                'biller' => collect($arr)->collapse(),
                'items' =>  $mapped,
                'transaction_type' => $transactionType,
                'item_count' => count($items),
                'amount' => $sum,
                'handling_fee' => count($items) * $getHandlingFee,
                'currency' => $currency
            ];

        });

        $newArr = [
            'total_amount' => $thirdStep->sum('amount'),
            'total_count' => $thirdStep->sum('item_count'),
            'total_handling' => $thirdStep->sum('handling_fee'),
        ];

        $merged = [
            'data' => $thirdStep,
            'computation' => $newArr,
        ];

        return response()->json($merged);
    }

    public function processForApproval(Request $request)
    {
        $status = 'FOR VERIFICATION';

        DB::beginTransaction();
        try {
            Monitoring::create([
                'item_count' => $request->summary['total_count'],
                'status' => $status,
                'process_data' => json_encode($request->summary),
                'batch_upload' => json_encode($request->batchUpload),
                'user_id' => auth()->user()->id,
            ]);

            $transactions = Transaction::whereIn('eos_batch_id', $request->selectedIds)->get('id');
            $arr = [];
            foreach ($transactions as $getId){
               $arr[] = $getId['id'];
            }

//            $this->transaction->whereIn('id', $arr)->delete();

            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function changeStatus($id){
        $getTransaction = Monitoring::findOrFail($id)->first();

        $getTransaction->update([
            'status' => "FOR APPROVAL",
        ]);

        return response()->json(['message' => 'For Approval.']);
    }

    public function monitoring(){
        $monitoring = Monitoring::all();

        return response()->json($monitoring);
    }

    public function outfile($monitoring_id){
        $monitoring = Monitoring::with(['getUser'])->where('id', $monitoring_id)->get();

        $arr = [];

        foreach ($monitoring as $items){
            $getTotal = json_decode($items['process_data'], true);

            $arr = [
                'transaction' => collect(json_decode($items['process_data'], true))->collapse(),
                'batch_upload' => collect(json_decode($items['batch_upload'], true)),
                'item_count' => $items['item_count'],
                'total_amount' => $getTotal['total_amount'],
                'processed_by' => $items['getUser'],
            ];
        }
        return response()->json(collect($arr));
    }
}
