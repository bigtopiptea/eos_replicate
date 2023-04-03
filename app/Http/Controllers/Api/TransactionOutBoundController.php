<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Transaction, CustomerDetails};

class TransactionOutBoundController extends BaseController
{
    private $transaction, $customer;

    public function __construct(Transaction $transaction, CustomerDetails $customer)
    {
        $this->transaction = $transaction;
        $this->customer = $customer;
    }

    public function getAllTransactions()
    {
        $transactions = $this->transaction->getProcessedTransactions();

        return $this->sendResponse($this->transaction->consolidateByBatchNumberWithPagination($transactions), "All Processed Transactions By Pagination");
    }

    public function getCustomerDetails(){
        return $this->customer->getCustomerDetails();
    }
}
