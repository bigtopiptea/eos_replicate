<?php

namespace App\Http\Controllers\API\Branch;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\BranchRequest;
use App\Models\Branch;
use App\Models\Rate;
use Intervention\Image\Image;
use Symfony\Component\HttpFoundation\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::get(['id', 'name']);
        $arr = [];

        foreach ($branches as $branch) {
            $arr[] = [
                'value' => $branch->id,
                'label' => $branch->name,
            ];
        }

        return response()->json($arr);
    }

    public function branchesPagination()
    {
        $branches = Branch::with(['companyName'])->paginate(10);

        return response()->json($branches);
    }

    public function store(BranchRequest $request)
    {
        if ($request->logo) {
            $logo_name = generateImageName($request->logo);
            resizeImage($request->logo);
        }

        $branch_data = Branch::create([
            'company_id' => $request->company['id'],
            'name' => $request->branch_name,
            'branch_id' => $request->branch_id,
            'type_of_charging' => $request->type_of_charging['title'],
            'type_of_fee' => $request->type_of_fee['label'],
            'contact_number' => $request->contact_no,
            'address' => $request->branch_address,
            'country' => $request->country['value'],
            'region' => $request->region['value'],
            'province' => $request->province['value'],
            'city' => $request->city['value'],
            'zip_code' => $request->zip_code,
            'reference_number' => $request->preview_reference_number,
            'currency' => json_encode($request->currencies),
            'user_id' => $request->user_id,
            'logo' => $request->logo ? $logo_name : '',
        ]);
//
//        if ($branch_data->count() > 0) {
//            foreach ($request->currencies as $currency) {
//                Rate::create([
//                    'source' => 'eos',
//                    'branch_id' => $branch_data->id,
//                    'currency_from' => $currency['from_currency']['value'],
//                    'currency_to' => $currency['to_currency']['value'],
//                    'last_update_by' => $request->user_id,
//                ]);
//                Rate::create([
//                    'source' => 'sophia',
//                    'branch_id' => $branch_data->id,
//                    'currency_from' => $currency['from_currency']['value'],
//                    'currency_to' => $currency['to_currency']['value'],
//                    'last_update_by' => $request->user_id,
//                ]);
//            }
//        }

        return response()->json(['message' => 'Branch Created!']);
    }

    public function update(Branch $branch, Request $request)
    {
        if ($request->logo) {

            if (checkImageIfBase64($request->logo)) {
                $logo_name = generateImageName($request->logo);
                resizeImage($request->logo);
            }
        }

        $branch->company_id = $request->company['id'];
        $branch->name = $request->branch_name;
        $branch->address = $request->branch_address;
        $branch->contact_number = $request->contact_no;
        $branch->country = gettype($request->country) === "array" ? $request->country['value'] : $branch->country;
        $branch->region = gettype($request->region) === "array" ? $request->region['value'] : $branch->region;
        $branch->province = gettype($request->province) === "array" ? $request->province['value'] : $branch->province;
        $branch->city = gettype($request->city) === "array" ? $request->city['value'] : $branch->city;
        $branch->zip_code = $request->zip_code;
        $branch->reference_number = $request->preview_reference_number;
        $branch->logo = $logo_name ?? $request->logo;
        $branch->currency = $request->currencies;

        $branch->update();

        return response()->json(['message' => 'Update Successfully']);
    }

    public function removeCurrency(Branch $branch, Request $request)
    {
        $branch_currency = $branch->currency;

        unset($branch_currency[$request->id]);

        $branch->update([
            'currency' => $branch_currency,
        ]);

        return response()->json(['message' => 'Update Successfully']);
    }

    public function addCurrency(Branch $branch, Request $request)
    {

        $add_currency = array_merge($branch->currency, $request->currency);

        $branch->update([
            'currency' => $add_currency,
        ]);

        return response()->json(['message' => 'Update Successfully']);
    }

    public function show($id)
    {
        $branch = Branch::with(['companyName', 'country', 'region', 'province', 'city'])->findOrFail($id);

        return response()->json($branch);
    }

    public function getBranchByCompany($id)
    {
        $branchByCompany = Branch::select(['id', 'name'])->where('company_id', $id)->get();
        $arr = [];

        foreach ($branchByCompany as $i) {
            $arr[] = [
                "label" => $i->name,
                "value" => $i->id
            ];
        }
        return response()->json($arr);
    }
}
