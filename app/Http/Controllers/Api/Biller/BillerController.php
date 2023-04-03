<?php

namespace App\Http\Controllers\Api\Biller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Biller\StoreBillerRequest;
use App\Models\Biller;
use App\Models\Maintenance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillerController extends Controller
{
    public function index()
    {
        $biller_bp = Maintenance::where('meta_value', 'BILLS PAYMENT')->with([
            'biller' => function ($query) {
                return $query->with(['billerCategoryName']);
            }
        ])->get();

        $biller = $biller_bp->map(function ($items) {
            return $items->biller;
        });

        $collected = $biller->collapse()->paginate(10);

        return response()->json($collected);
    }

    public function getCBAType(){
        $billers = Biller::get(['id', 'name']);

        $arr = [];
        foreach ($billers as $biller){
            $arr[] = [
                'id' => $biller->id,
                'name' => $biller->name,
            ];
        }

        return response()->json($arr);
    }

    public function getBillerByTransactionType($transaction_type)
    {
        $billers = Biller::where('transaction_type_id', $transaction_type)->get();

        $arr = [];

        foreach ($billers as $biller) {
            $arr[] = [
                'value' => $biller->id,
                'label' => $biller->name
            ];
        }

        return response()->json($arr);
    }

    public function store(StoreBillerRequest $request)
    {

        Biller::create([
            'biller_category_id' => $request->category['value'],
            'transaction_type_id' => $request->category['transaction_type']['id'],
            'payment_type' => $request->payment_type['label'],
            'amount_range' => collect($request->amount_range),
            'provider_id' => $request->providers['id'],
            'name' => $request->name,
            'fields' => collect($request->fields)
        ]);

        return response()->json(['message' => 'Biller Save Successfully!']);
    }
}
