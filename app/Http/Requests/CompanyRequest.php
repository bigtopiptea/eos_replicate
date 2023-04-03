<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
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

    public function createRules()
    {
        return [
            'name' => 'required|unique:companies',
            'type_of_fee' => 'required',
        ];
    }

    public function updateRules(){
        return [
            'name' =>['required', Rule::unique('companies')->ignore($this->route('id'))],
            'type_of_fee' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Company Name is required.',
            'name.unique' => 'Company Name is Already Taken',
            'type_of_fee.required' => 'Type of fee field is required',
        ];
    }
}
