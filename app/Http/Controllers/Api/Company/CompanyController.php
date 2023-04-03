<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CompanyCollection;
use App\Mail\customEmail;
use Mail;
use App\Models\Company;
use Carbon\Carbon;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all(['id', 'name', 'partner_code']);
        $arr = [];

        foreach ($companies as $company) {
            $arr[] = [
                'id' => $company->id,
                'name' => $company->name,
                'partner_code' => $company->partner_code
            ];
        }

        return response()->json($arr);
    }

    public function companyPagination()
    {

        // Mail::to('rrb@optimumremit.com')->send(new customEmail(Company::first()));

        $column = request('column');
        $per_page = request('per_page', 1);
        $sortBy = request('sortBy') == 'true' ? 'ASC' : 'DESC';

        $relationships = ['addedBy'];

        $model = Company::select('companies.*');

        $filter = request('q');

        $filters = $model->where('id', 'like', '%' . $filter . '%')
            ->orWhere('name', 'like', '%' . $filter . '%')
            ->orWhere('partner_code', 'like', '%' . $filter . '%');

        return sortTableByColumn($model, 'companies', $column, $sortBy, $per_page, $filters, $relationships, '');
    }

    public function store(CompanyRequest $request)
    {

        if ($request->logo) {
            $logo_name = generateImageName($request->logo);
            resizeImage($request->logo);
        }

        $isActive = $request->isActive == 1 ? true : false;

        $company = Company::create([
            'name' => $request->name,
            'partner_code' => $request->partner_code,
            'isActive' => $isActive,
            'type_of_charging' => $request->type_of_fee['title'],
            'added_by'=> auth()->user()->id,
            'logo' => $request->logo ? $logo_name : '',
        ]);

        return response()->json(['message' => $company->name .' '. 'Successfully Added!']);
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);


        return response()->json($company);
    }

    public function update()
    {
    }
    public function updateCompanydetails($id, CompanyRequest $request)
    {


        $company = Company::whereId($id)->first();
        $company->name = $request->name;
        $company->type_of_charging = $company->type_of_charging === $request->type_of_fee ? $company->type_of_charging : $request->type_of_fee['title'];

        if ($request->logo) {
            if (checkImageIfBase64($request->logo)) {
                $logo_name = generateImageName($request->logo);
                resizeImage($request->logo);
            }

            $company->logo = $logo_name ?? $request->logo;
        }

        $company->update();

        return response()->json(['message' => 'Company Details Successfully Updated!']);
    }

    public function updateCompanyStatus(Request $request)
    {
        $company = Company::whereId($request->id)->first();

        $company->isActive = $request->isActive == 1 ? false : true;

        $company->update();

        return response()->json(['message' => 'Company Status Successfully Updated!']);
    }

    public function destroy($id)
    {
    }
}
