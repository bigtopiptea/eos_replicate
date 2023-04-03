<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{Transaction, CustomerDetails, Branch};
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionInBoundController extends BaseController
{

    private $transaction, $customer;

    public function __construct(Transaction $transaction, CustomerDetails $customer)
    {
        $this->transaction = $transaction;
        $this->customer = $customer;
    }

    public function getCustomerDetails(){
        return 'test';
    }

    public function saveTransaction(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'transaction' => 'required|array',
            'remitter' => 'required|array',
        ]);

//        return $request->all();

        if ($validator->fails()) return $this->sendError($validator->errors(), 'Some fields is required.');

        if (!auth()->user()->tokenCan('transaction:post,put')) return $this->unauthorizedResponse();

        if (empty($request->transaction['class'])) {

            DB::beginTransaction();
            try {

                //transactions
                //modify string to dateTimeFormat
//                $incrementBatchId =  self::pluck('eos_batch_id')->last() + 1;

                $formattedTransaction = array_map(function ($item) {
                    return array_merge($item, [
                        'status' => $this->transaction::TRANSACTION_STATUS_FOR_VERIFICATION,
                        'eos_batch_id' => $this->transaction->incrementEosBatchId() === 0 ? 1 :  $this->transaction->incrementEosBatchId(),
                        'created_at' => Carbon::parse($item['created_at'])->toDateTimeString(),
                        'updated_at' => Carbon::parse($item['updated_at'])->toDateTimeString(),
                    ]);
                }, $request->transaction);

                $transactionChunk = array_chunk($formattedTransaction, 100);

                $transaction = array_map(function ($transaction) {
                    return $this->transaction->insert($transaction);
                }, $transactionChunk);

                //remitter
                //modify string to dateTimeFormat
                $formattedRemitter = array_map(function ($item) {
                    return array_merge($item, [
                        'created_at' => Carbon::parse($item['created_at'])->toDateTimeString(),
                        'updated_at' => Carbon::parse($item['updated_at'])->toDateTimeString(),
                    ]);
                }, $request->remitter);

                $remitterChunk = array_chunk($formattedRemitter, 100);
                $remitter = array_map(function ($remitter) {
                    return $this->customer->insert($remitter);
                }, $remitterChunk);

                //beneficiary
                //modify string to dateTimeFormat
                $formattedBeneficiary = array_map(function ($item) {
                    return array_merge($item, [
                        'created_at' => Carbon::parse($item['created_at'])->toDateTimeString(),
                        'updated_at' => Carbon::parse($item['updated_at'])->toDateTimeString(),
                    ]);
                }, $request->beneficiary);

                $beneficiaryChunk = array_chunk($formattedBeneficiary, 100);
                $beneficiary = array_map(function ($beneficiary) {
                    return $this->customer->insert($beneficiary);
                }, $beneficiaryChunk);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {;

            $typeOfCharging = Branch::findOrFail($request->transaction['branch_id'])->type_of_charging;
            $transaction = $this->transaction->saveTransaction($request->transaction, $typeOfCharging);
            $remitter = $this->customer->saveRemitter($request->remitter);
            $beneficiary = $this->customer->saveBeneficiary($request->beneficiary);
        }
        return $this->sendResponse($transaction, "success");
    }
}
