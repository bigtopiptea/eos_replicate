<?php

namespace App\Http\Controllers\Api\HandlingFee;

use App\Http\Controllers\Controller;
use App\Http\Requests\HandlingFee\StoreServiceFeeRequest;
use App\Models\HandlingFee;
use Illuminate\Http\Request;

class HandlingFeeController extends Controller
{
    public function index(){

        $currency = request('queryField');
        $tie_up = request('tie_up');

        $handling_fee = HandlingFee::when($currency, function ($query) use ($currency) {
            return $query->where('currency', 'like',  "%$currency%");
        })->whereHas('getBiller', function ($query) use ($tie_up) {
            $query->where('name', 'like', "%$tie_up%");
        })->with(['getBiller', 'getCompany', 'transactionType', 'getUser'])->paginate(2);

        return response()->json($handling_fee);
    }

    public function sortByCurrency(){
        $currencies = HandlingFee::select(['id', 'currency'])->get()->unique('currency');

        $arr = [];

        foreach($currencies as $currency){
            $arr[] = [
                'value' => $currency->id,
                'label' => $currency->currency,
            ];
        }

        return response()->json($arr);
    }

    public function storeServiceFee(StoreServiceFeeRequest $request)
    {
        HandlingFee::create([
            'tie_up' => $request->tie_up,
            'transaction_type_id' => $request->transaction_type['value'],
            'biller_id' => $request->bank_or_biller_name['value'],
            'currency' => $request->currency['label'],
            'service_fee' => $request->service_fee,
            'last_updated_by' => auth()->user()->id,
        ]);

        return response()->json(['message' => 'Service Fee Has been Created.']);
    }

    public function updateMultipleServiceFee(Request $request){
        $ids = $request->ids;
        $service_fee = $request->service_fee;


        $fees = HandlingFee::whereIn('id', $ids)->update([
            'service_fee' => $service_fee,
        ]);;

        return response()->json(['message' => 'Service Fees Has Been Updated.']);
    }
}
