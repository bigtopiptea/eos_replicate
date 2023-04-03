<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public const TRANSACTION_STATUS_FOR_APPROVAL = 'for-approval';
    public const TRANSACTION_STATUS_FOR_VERIFICATION = 'for-verification';
    public const TRANSACTION_STATUS_APPROVED = 'approved';

    protected $fillable = [
        'company_id',
        'branch_id',
        'user_id',
        'class',
        'user_id',
        'branch_id',
        'company_id',
        'item_count',
        'transaction_date',
        'processing_type',
        'reference_number',
        'amendment_reference_number',
        'transaction_type',
        'original_currency',
        'original_amount',
        'exchange_rate',
        'remittance_currency',
        'gross_amount',
        'service_fee',
        'operation',
        'net_amount',
        'remitter_id',
        'beneficiary_id',
        'bank_name',
        'bank_branch',
        'account_number',
        'status',
        'instruction_1',
        'instruction_2',
        'instruction_3',
        'good_value_date',
        'batch_number',
        'eos_batch_id',
        'uploader_id',
        'uploaded_by',
        'uploader_email'
    ];

    public static function getTransactionStatuses(): array
    {
        return [
            self::TRANSACTION_STATUS_FOR_APPROVAL,
            self::TRANSACTION_STATUS_FOR_VERIFICATION,
            self::TRANSACTION_STATUS_APPROVED,
        ];
    }

    public static function getReadableTransactionStatus(string $TxnStatus)
    {
        $map = [
            self::TRANSACTION_STATUS_FOR_APPROVAL => 'For Approval',
            self::TRANSACTION_STATUS_FOR_VERIFICATION => 'For Verification',
            self::TRANSACTION_STATUS_APPROVED => 'Approved',
        ];

        return $map[$TxnStatus];
    }

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function incrementEosBatchId(){
        return  self::pluck('eos_batch_id')->last() + 1;
    }

    public function saveTransaction($transaction, $typeOfCharging = null)
    {

        return $this->create([
            'company_id' => $transaction['company_id'],
            'branch_id' => $transaction['branch_id'],
            'user_id' => $transaction['user_id'],
            'class' => $transaction['class'],
            'transaction_type' => $transaction['transaction_type'],
            'original_currency' => $transaction['original_currency'],
            'original_amount' => $transaction['original_amount'],
            'exchange_rate' => $transaction['exchange_rate'],
            'gross_amount' => $transaction['gross_amount'],
            'service_fee' => $transaction['service_fee'],
            'net_amount' => $typeOfCharging == 'add' ? $transaction['gross_amount'] : $transaction['net_amount'],
            'remitter_id' => $transaction['remitter_id'],
            'beneficiary_id' => $transaction['beneficiary_id'],
            'batch_number' => $transaction['batch_number'],
            'eos_batch_id' => self::incrementEosBatchId() === 0 ?  1 : self::incrementEosBatchId(),
            'reference_number' => $transaction['reference_number'],
            'bank_name' => $transaction['bank_name'],
            'account_number' => $transaction['account_number'],
            'status' => self::TRANSACTION_STATUS_FOR_VERIFICATION,
            'uploader_id' => $transaction['uploader_id'],
            'uploaded_by' => $transaction['uploaded_by'],
            'uploader_email' => $transaction['uploader_email'],
        ]);
    }

    public static function eosGetAllTransactions()
    {
        return self::with(['getTieup'])->get([
                'batch_number', 'path', 'user_id', 'original_amount', 'gross_amount',
                'exchange_rate', 'original_currency', 'status', 'created_at',
                'uploaded_by', 'uploader_id', 'uploader_email', 'company_id', 'eos_batch_id',
            ])
            ->groupBy(['batch_number']);
    }


    public static function getProcessedTransactions()
    {
        return self::toBase()
            ->whereCompany_id(auth()->user()->company_id)
            ->get([
                'batch_number', 'path', 'user_id', 'original_amount', 'gross_amount',
                'exchange_rate', 'original_currency', 'status', 'created_at',
                'uploaded_by', 'uploader_id', 'uploader_email', 'company_id',
            ])
            ->groupBy('batch_number');
    }

    public function getTieup(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function consolidateByBatchNumberWithPagination($transactions)
    {
//        dd($transactions)
//        $company_name = Company::where($transactions);
        $data = collect([]);
        foreach ($transactions as $transaction) {
            $batchNumber = 0;
            $batchId = 0;
            $itemCount = 0;
            $totalAmount = 0;
            $exchangeRate = 0;
            $userId = 0;
            $uploadedAt = null;
            $status = null;
            $uploader_id = null;
            $uploadedAt = null;
            $uploaded_by = null;
            $uploaded_email = null;
            $getTieup = null;

            foreach ($transaction as $value) {
                $getTieup = $value->getTieup ?? null;
                $amount = $value->original_amount ?: $value->gross_amount;
                $totalAmount += (float)str_replace(',', '', $amount);
                $exchangeRate = $value->exchange_rate;
                $batchNumber = $value->batch_number;
                $batchId = $value->eos_batch_id;
                $original_currency = $value->original_currency;
                $status = $value->status;
                $uploader_id = $value->uploader_id;
                $uploadedAt = $value->created_at;
                $uploaded_by = $value->uploaded_by;
                $uploaded_email = $value->uploader_email;
            }
            $totalAmount = money_format($totalAmount);
            $itemCount = count($transaction);
            // $user = User::findorfail($userId);
            //add company and branch in uploaded_by

            $data[] = [
                'batch_number' => $batchNumber,
                'batch_id' => $batchId,
                'filename' => last(explode('/', $value->path)),
                'uploaded_by' => $uploaded_by,
                'company_name' => $getTieup ,
                'email_address' => $uploaded_email,
                'total_count' => $itemCount,
                'total_amount' => $totalAmount,
                'exchange_rate' => $exchangeRate ?? '0.00',
                'original_currency' => $original_currency,
                'date_uploaded' => $uploadedAt,
                'status' => Transaction::getReadableTransactionStatus($status)
            ];
        }
        return paginate($data, 10);
    }

    public function getRemitter(){
        return $this->belongsTo(CustomerDetails::class, 'remitter_id', 'id');
    }

    public function getBeneficiary(){
        return $this->belongsTo(CustomerDetails::class, 'beneficiary_id', 'id');
    }
}
