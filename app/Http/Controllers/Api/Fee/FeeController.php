<?php

namespace App\Http\Controllers\Api\Fee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fees\StoreAmendmentFeeRequest;
use App\Http\Requests\Fees\StoreFeesRequest;
use App\Http\Requests\Fees\StoreRefundFeeRequest;
use App\Models\Biller;
use App\Models\Branch;
use App\Models\Fee;
use App\Models\Maintenance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class FeeController extends Controller
{

    public function index()
    {
        $billers = Biller::get(['id', 'payment_type', 'amount_range']);

        $branchTypeOfFee = Branch::where('id', auth()->user()->branch_id)->select(['type_of_fee'])->get();

        $res = $branchTypeOfFee->map(function ($type) {
            return $type->type_of_fee;
        });

        $type = implode("", $res->toArray());
        //saving of fees
        if (auth()->user()->role === "maker") {
            $biller_category = $billers->map(function ($biller) use ($type) {
                $isBillerExists = Fee::where([
                    'company_id' => auth()->user()->company_id,
                    'branch_id' => auth()->user()->branch_id,
                    'biller_id' => $biller->id,
                ])->exists();

                if (!$isBillerExists) {

                    $amount_range = json_decode($biller->amount_range);

                    $check_length = count($amount_range ? $amount_range : []);

                    $currencies = collect(auth()->user()->branchCurrency())
                        ->map(
                            function ($currency) use ($biller, $check_length, $amount_range, $type) {
                                $sorted = collect($currency)->map(
                                    function ($currs) use ($biller) {
                                                return $currs;
                                            }
                                );
                                $sortedCurrency = collect($sorted)->map(
                                    function ($items) use ($biller, $amount_range, $check_length, $type) {
                                        if ($check_length > 0) {
                                            $amountRange = collect($amount_range)->map(
                                                function ($range) use ($biller, $amount_range, $items, $check_length, $type) {
                                                 $array = json_decode($items, true);
                                                 $mapped = array_map(function ($item) use ($biller, $type, $amount_range, $range) {
                                                     $convertAmountRange = get_object_vars($range);
                                                     $eosFee = Fee::create([
                                                         'company_id' => auth()->user()->company_id,
                                                         'branch_id' => auth()->user()->branch_id,
                                                         'source' => 'eos',
                                                         'biller_id' => $biller->id,
                                                         'amount_range' => $biller->amount_range ?
                                                             json_encode($convertAmountRange['from']
                                                                 . "-" . $convertAmountRange['to']) : null,
                                                         'type_of_fee' => $type,
                                                         'currency' =>
                                                             json_encode($item['from_currency']['label']
                                                                 . ' - ' .
                                                                 $item['to_currency']['label']),
                                                         'last_updated_by' => auth()->user()->id,
                                                     ]);

                                                     $sophiaFee = $eosFee->replicate()->fill([
                                                         'source' => 'sophia',
                                                     ]);

                                                     $sophiaFee->save();
                                                 }, $array);
                                                }
                                            );
                                        } else if (!$check_length) {
                                            $array = json_decode($items, true);
                                            $mapped = array_map(function ($item) use ($biller, $type) {
                                                $eosFee = Fee::create([
                                                    'company_id' => auth()->user()->company_id,
                                                    'branch_id' => auth()->user()->branch_id,
                                                    'source' => 'eos',
                                                    'biller_id' => $biller->id,
                                                    'amount_range' => null,
                                                    'type_of_fee' => $type,
                                                    'currency' =>
                                                    json_encode($item['from_currency']['label'] . '-' . $item['to_currency']['label']),
                                                    'last_updated_by' => auth()->user()->id,
                                                ]);

                                                $sophiaFee = $eosFee->replicate()->fill([
                                                    'source' => 'sophia',
                                                ]);

                                                $sophiaFee->save();
                                            }, $array);
                                        }
                                    }
                                );
                            }
                        );
                }
            });
        }

        $biller_Ids = Fee::select(['biller_id'])->distinct()->get();

        $query_field = request('queryField');
        $search = request('search');

        $fees_data = $biller_Ids->map(function ($biller_Ids) use ($query_field, $search) {
            return collect(Fee::when(
                $query_field,
                function ($query) use ($query_field, $search) {
                    $query->where('currency', 'like', "%$query_field%");
                }
            )->whereHas(
                    'biller',
                    function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    }
                )->with([
                    'getBranch',
                    'biller' => function ($query) {
                        return $query->with([
                            'transactionType',
                            'billerCategoryName' => function ($q) {
                                        return $q->with(['transactionName']);
                                    }
                        ]);
                    }
                    ,
                    'fullname',

                ])
                ->whereIn('biller_id', $biller_Ids)
                ->where('branch_id', auth()->user()->branch_id)
                ->where('source', 'eos')->get());
        });

        //        $fees_data = Fee::where('amount_range', null)->get();

        $mergeData = $fees_data->collapse()->paginate(10);
        return response()->json($mergeData);
    }
    public function getBranchCurrency()
    {
         $branch_currency = Branch::where('id', auth()->user()->branch_id)->first();

         $from_currency = collect($branch_currency->currency)->map(function ($currency) {
             return collect($currency['from_currency']);
         });

         $unique_currency = $from_currency->unique('label');

         return response()->json($unique_currency);
    }
    public function updateServiceFee($id, StoreFeesRequest $request)
    {
        $fees_data = Fee::findOrFail($id);


        $fees_data->type_of_fee = $request->type_of_fee === null ? $fees_data->type_of_fee : $request->type_of_fee['label'];

        $fees_data->last_updated_by = auth()->user()->id;

        if ($request->service_fee) {
            $fees_data->service_fee = $request->service_fee;
        }
        //        else if ($request->amendment_fee) {
        //            $fees_data->amendment_fee = $request->amendment_fee === null ? '0' : $request->amendment_fee;
        //        } else {
        //            $fees_data->refund_fee = $request->refund_fee === null ? '0' : $request->refund_fee;
        //        }

        $fees_data->update();

        return response()->json(['message' => 'Fee Has Been Updated']);
    }

    public function updateMultipleServiceFee(StoreFeesRequest $request)
    {
        $ids = $request->ids;
        $service_fee = $request->service_fee;

        $fees = Fee::whereIn('id', $ids)->update([
            'service_fee' => $service_fee,
        ]);

        return response()->json(['message' => 'Service Fee Updated Successfully!']);
    }

    public function updateMultipleAmendmentFee(StoreAmendmentFeeRequest $request)
    {
        $ids = $request->ids;
        $amendment_fee = $request->amendment_fee;

        $fees = Fee::whereIn('id', $ids)->update([
            'amendment_fee' => $amendment_fee,
        ]);
        ;

        return response()->json(['message' => 'Amendment Fee Updated Successfully!']);
    }

    public function updateMultipleRefundFee(StoreRefundFeeRequest $request)
    {
        $ids = $request->ids;
        $refund_fee = $request->refund_fee;

        $fees = Fee::whereIn('id', $ids)->update([
            'refund_fee' => $refund_fee,
        ]);
        ;

        return response()->json(['message' => 'Refund Fee Updated Successfully!']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
