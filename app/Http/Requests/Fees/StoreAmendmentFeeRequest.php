<?php

namespace App\Http\Requests\Fees;

use Illuminate\Foundation\Http\FormRequest;

class StoreAmendmentFeeRequest extends FormRequest
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
            'amendment_fee' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'amendment_fee.required' => 'Amendment Fee Must Not Be Empty',
        ];
    }
}
