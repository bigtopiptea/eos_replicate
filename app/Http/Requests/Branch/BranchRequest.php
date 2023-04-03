<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return $this->createRules();
        } elseif ($this->isMethod('put')) {
            return $this->updateRules();
        }

    }

    public function createRules(): array
    {
        return [
            'company' => ['required'],
            'branch_name' => ['required'],
            'type_of_charging' => 'required',
            'type_of_fee' => 'required',
            'contact_no' => ['required'],
            'branch_address' => ['required'],
            'country' => ['required'],
            'region' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'currencies' => "required|array|min:2",
            'currencies.*.from_currency' => ['required'],
            'currencies.*.to_currency' => ['required'],
            'zip_code' => ['required', 'max:10'],
            'reference_number' => 'required|regex:/^\S*$/u',
        ];
    }

    public function updateRules(): array
    {
        return [
            'company' => ['required'],
            'branch_name' => ['required'],
            'contact_no' => ['required'],
            'branch_address' => ['required'],
            'country' => ['required'],
            'region' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'currencies' => "required|array|min:2",
            // 'currencies.*.from_currency' => ['required'],
            // 'currencies.*.to_currency' => ['required'],
            'zip_code' => ['required', 'max:10'],
            'reference_number' => 'required|regex:/\S+/',
            // 'logo' => ['mimes|png, jpg, jpeg', 'required'],
        ];
    }

    public function messages()
    {
        return [
            'company.required' => ':attribute field is required',
            'type_of_charging.required' => ':attribute field is required',
            'type_of_fee.required' => ':attribute field is required',
            'branch_name.required' => ':attribute field is required',
            'contact_no.required' => ':attribute field is required',
            'branch_address.required' => ':attribute field is required',
            'country.required' => ':attribute field is required',
            'region.required' => ':attribute field is required',
            'province.required' => ':attribute field is required',
            'city.required' => ':attribute field is required',
            'zip_code.required' => ':attribute field is required',
            'reference_number.required' => ':attribute field is required',
            'reference_number.regex' => 'No space in :attribute field',
            'currencies.*.from_currency.required' => 'This field is required',
            'currencies.*.to_currency.required' => 'This field is required',
        ];
    }
}
