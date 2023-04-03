<?php

namespace App\Http\Controllers\Api\Rate;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\CmtRate;
use App\Models\Company;
use App\Models\Fee;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        $branchCurrency = Branch::where('id', $user->branch_id)->pluck('currency');
           $result =  $branchCurrency->map(function ($currency) use ($user){
               $currs = json_decode($currency, true);
               $results =  collect($currs)->map(function ($curr) use ($user, $currs) {
                   $qwer = Rate::where('source', 'eos')->where('branch_id', $user->branch_id)
                       ->whereIn('currency_from', $curr['from_currency'])
                       ->whereIn('currency_to', $curr['to_currency'])
                       ->select(['branch_id', 'currency_from', 'currency_to'])->doesntExist();

                   if($qwer){
                       Rate::create([
                           'source' => 'eos',
                           'branch_id' => $user->branch_id,
                           'currency_from' => $curr['from_currency']['value'],
                           'currency_to' => $curr['to_currency']['value'],
                           'last_update_by' => $user->id,
                       ]);
                       Rate::create([
                           'source' => 'sophia',
                           'branch_id' => $user->branch_id,
                           'currency_from' => $curr['from_currency']['value'],
                           'currency_to' => $curr['to_currency']['value'],
                           'last_update_by' => $user->id,
                       ]);
                   }
                });
           });

        $rateData = Rate::where('branch_id', $user->branch_id)->with(['fromCurrency', 'toCurrency', 'fullname', 'branchName'])->isEos()->paginate(10);
        return response()->json($rateData);
    }

    public function cmtRate()
    {
        $companies = Company::get('id');
        $user = auth()->user();

        foreach ($companies as $ids) {
            $isCmtRateExists = CmtRate::where('company_id', $ids['id'])->exists();
            if(!$isCmtRateExists){
                CmtRate::create([
                    'company_id' => $ids['id'],
                    'user_id' => $user->id,
                ]);
            }
        }

        $cmtRates = CmtRate::with(['company', 'user'])->get();

        return response()->json($cmtRates);
    }

    public function updateCmtRate($id, Request $request){

        $cmtRate = CmtRate::findOrFail($id);

        $cmtRate->noon_rate = $request->noon_rate;
        $cmtRate->final_rate = $request->final_rate;
        $cmtRate->activated_rate = $request->activate_rate;

        $cmtRate->update();

        return response()->json(['message' => 'Rate Updated  Successfully.']);
    }
}
