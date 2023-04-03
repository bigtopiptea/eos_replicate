<?php

namespace App\Http\Requests\HandlingFee;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceFeeRequest extends FormRequest
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
        return [
            'tie_up' => 'required',
            'transaction_type' => 'required',
            'bank_or_biller_name' => 'required',
            'currency' => 'required',
            'service_fee' => 'required|numeric',
        ];
    }
}
