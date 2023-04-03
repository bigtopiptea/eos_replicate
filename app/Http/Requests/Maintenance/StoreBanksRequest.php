<?php

namespace App\Http\Requests\Maintenance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBanksRequest extends FormRequest
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
            'meta_id' => 'required|unique:maintenances',
            'meta_value' => 'required|unique:maintenances',
            'provider' => 'required',
            'payment_type' => 'required',
            'amount_range.*.from' => $this->payment_type === 'Amount Range' ? 'required|integer' : '',
            'amount_range.*.to' => $this->payment_type === 'Amount Range' ? 'required|integer' : '',
        ];
    }

    public function updateRules(): array
    {
        return [
            'meta_id' => ['required', Rule::unique('maintenances')->ignore($this->route('id'))],
            'meta_value' => ['required', Rule::unique('maintenances')->ignore($this->route('id'))],
            'provider' => 'required',
            'payment_type' => 'required',
            'amount_range.*.from' => $this->payment_type === 'Amount Range' ? 'required|integer' : '',
            'amount_range.*.to' => $this->payment_type === 'Amount Range' ? 'required|integer' : '',
        ];
    }

    public function messages()
    {
        return [
            'meta_id.required' => 'Bank code field is required',
            'meta_value.required' => 'Bank name field is required',
            'meta_id.unique' => 'Bank code is already been taken',
            'meta_value.unique' => 'Bank name is already been taken',
            'providers.unique' => 'Provider Field is required',
            'amount_range.*.from.required' => 'Amount range field is required',
            'amount_range.*.to.required' => 'Amount range field is required',
            'amount_range.*.from.integer' => 'Amount range must be a number',
            'amount_range.*.to.integer' => 'Amount range must be a number',
        ];
    }
}
