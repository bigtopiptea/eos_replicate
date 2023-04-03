<?php

namespace App\Http\Requests\Biller;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillerRequest extends FormRequest
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
            'category' => 'required',
            'name' => 'required',
            'payment_type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'Biller Category Field is Required.',
            'name.required' => 'Biller Name Field is Required.',
            'payment_type' => 'Payment Type Field is Required.',
        ];
    }
}
