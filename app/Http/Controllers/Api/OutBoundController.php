<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CmtRate;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Branch;
use App\Models\User;
use App\Models\Biller;
use App\Models\Fee;
use App\Models\Maintenance;
use App\Models\Country;
use App\Models\Rate;


class OutBoundController extends BaseController
{

    // GET ALL DATA WITH PAGINATION

    public function companies()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $data = Company::paginate(10);
        return $this->sendResponse($data, "All Companies.");
    }

    public function branches()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $data = Branch::with('companyName')->paginate(10);
        return $this->sendResponse($data, "All Branches.");
    }

    public function billerCategory()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $data = Maintenance::select(['meta_id', 'meta_name', 'meta_value'])->where('meta_name', 'BILLER_CATEGORY')->paginate(10);
        return $this->sendResponse($data, "All Biller Categories.");
    }

    public function billers()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $data = Biller::with('billerCategoryName')->paginate(10);
        return $this->sendResponse($data, "All Billers.");
    }

    public function transactionTypes()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $data = Maintenance::select(['meta_id', 'meta_name', 'meta_value'])->where('meta_name', 'transaction_type')->paginate(10);
        return $this->sendResponse($data, "All Transaction Types.");
    }

    public function banks()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $data = Maintenance::select(['meta_id', 'meta_name', 'meta_value'])->where('meta_name', 'CBA')->paginate(10);
        return $this->sendResponse($data, "All Banks.");
    }

    public function sourceOfFunds()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }

        $data = Maintenance::with('customField')->where('meta_name', 'SOURCE_OF_FUNDS')->paginate(10);
        return $this->sendResponse($data, "All Source of Funds.");
    }

    public function fees(Request $request)
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }

        $company_id = $request->input('company_id');
        $branch_id = $request->input('branch_id');
        $branch = Branch::where('id', $branch_id)->first();
        $currencies = $branch->currency;
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
                'biller' => function ($query) {
                    return $query->with([
                        'transactionType',
                        'billerCategoryName' => function ($q) {
                            return $q->with(['transactionName']);
                        }
                    ]);
                },
                'fullname',
            ])
                ->whereIn('biller_id', $biller_Ids)
                ->where('source', 'sophia')
                ->where('branch_id', auth()->user()->branch_id)->get());
        });

        //        $fees_data = Fee::where('amount_range', null)->get();

        $data = $fees_data->collapse()->paginate(10);

        return $this->sendResponse($data, "All fees");
    }

    public function rates(Request $request)
    {
        $is_admin = $request->input('role');
        $branch_id = $request->input('branch_id');

        $data = [];
        if ($is_admin == 'admin') {
            $data = Rate::with(['fromCurrency', 'toCurrency', 'fullname', 'branchName'])->where('source', 'sophia')->paginate(10);
        } else {
            $data = Rate::with(['fromCurrency', 'toCurrency', 'fullname'])->where('branch_id', $branch_id)->where('source', 'sophia')->paginate(10);
        }
        return $this->sendResponse($data, "All rates");
    }

    // GET ALL DATA FOR V-SELECT

    public function getCompanies()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }

        $data = Company::select(['id', 'name', 'partner_code'])->get();
        $arr = [];

        foreach ($data as $item) {
            $arr[] = [
                "label" => $item->name,
                "value" => $item->id,
                "code" => $item->partner_code
            ];
        }
        return $this->sendResponse($arr, "All Companies in Array.");
    }

    public function getBranches(Request $request)
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }

        $company_id = $request->input('company_id');

        $data = Branch::select(['id', 'name'])->where('company_id', $company_id)->get();
        $arr = [];

        foreach ($data as $item) {
            $arr[] = [
                "label" => $item->name,
                "value" => $item->id,
            ];
        }
        return $this->sendResponse($arr, "All Branches in Array.");
    }

    public function getTransactionTypes()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $data = Maintenance::where('meta_name', 'transaction_type')->get();
        $arr = [];

        foreach ($data as $item) {
            $arr[] = [
                "label" => $item->meta_value,
                "value" => $item->id,
                "name" => $item->meta_id,
            ];
        }
        return $this->sendResponse($arr, "All Transaction Types in Array.");
    }

    public function getSourceOfFunds()
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $data = Maintenance::with('customField')->where('meta_name', 'SOURCE_OF_FUNDS')->orderBy('meta_name', 'ASC')->get();
        $arr = [];
        foreach ($data as $i) {
//            dd(gettype();
//          $test = json_decode($i->customField->fields, true);
//          dd($test);
//            dd($i->customField->fields);
            $arr[] = [
                "label" => $i->meta_value,
                "value" => $i->id,
                "fields" => $i->customField->fields ?? null,
            ];
        }
        return $this->sendResponse($arr, "All source of funds in array");
    }

    public function getBranchCurrencies(Request $request)
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $data = Rate::with(['fromCurrency', 'toCurrency'])->where('branch_id', $request->input('branch_id'))->where('source', 'sophia')->get();
        $arr = [];
        foreach ($data as $item => $i) {
            $arr[] = [
                "label" => $i->fromCurrency->currency . '-' . $i->toCurrency->currency,
                "value" => $i->fromCurrency->id,
                "rate" => $i->rate,
            ];
        }

        return $this->sendResponse($arr, "All currency per branch");
    }


    public function getCmtRate(Request $request)
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }
        $cmtRates = CmtRate::where('company_id', $request->id)->get();

        return $this->sendResponse($cmtRates, "Rate Details.");
    }


    // GET ALL DATA WITHOUT PAGENATION

    public function getBranchDetails(Request $request)
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }

        $id = $request->input('branch-id');

        $data = Branch::select(['name', 'contact_number', 'reference_number', 'logo', 'type_of_charging'])->where('id', $id)->first();
        $id = $request->input('branch-id');
        $currency_used = $request->input('original-currency');

        $branch = Branch::where('id', $id)->first();


//        dd($branch->currencyUsed($branch->country, 'double'));

        $data = [
            'name' => $branch->name,
            'contact_number' => $branch->contact_number,
            'reference_number' => $branch->reference_number,
            'logo' => $branch->logo,
            'address' => $branch->address,
            'company_name' => $branch->company->name,
            'country' => $branch->countryName->name ?? '',
            'state' => $branch->stateName->name ?? '',
            'region' => $branch->regionName->name ?? '',
            'province' => $branch->provinceName->name ?? '',
            'city' => $branch->cityName->name ?? '',
            'currency' => $branch->currencyUsed($branch->country, 'double'),
            'currency_name' => $branch->currencyUsed($branch->country, 'single'),
            'equivalent_amount' => $branch->currencyUsed($branch->country, 'single') . ' ' . $currency_used,
            'type_of_charging' => $branch->type_of_charging,

        ];

        return $this->sendResponse($data, "Branch Detail");
    }
    public function getBillers(Request $request)
    {
        if (!auth()->user()->tokenCan('maintenance:get')) {
            return $this->unauthorizedResponse();
        }

        $type = $request->input('trasaction-type-id');
        $billers = Biller::with(['billerCategoryName', 'serviceFee'])->where('transaction_type_id', $type)->get();
        $arr = [];
        // dd($billers);
        // foreach ($billers as $i) {

        //get exchange rate

        $arr = $billers->map(function ($i) use ($arr) {
            $updatedBiller = Fee::where('biller_id', $i->id)->whereSource('sophia')->select(['amount_range', 'currency', 'service_fee'])->get();

            $a = $updatedBiller->map(function ($item) {
                return  [
                    "amount_range" => $item->amount_range,
                    "label" => str_replace('-', "-", str_replace('"', "", $item->currency)),
                    // "label" => $item->currency,
                    "service_fee" => $item->service_fee,
                ];
            });

            return $arr[] = [
                "label" => $i->name,
                "value" => $i->id,
                "fields" => $i->fields,
                'currency' => array_merge($arr, $a->toArray())
            ];
        });

        return $this->sendResponse($arr, "All Billers.");
    }
}
