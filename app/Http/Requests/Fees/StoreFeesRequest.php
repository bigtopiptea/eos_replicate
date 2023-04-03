<?php

namespace App\Http\Requests\Fees;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFeesRequest extends FormRequest
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
            'service_fee' => ['required', 'numeric']
        ];
    }

    public function updateRules(): array
    {
        return [
            'service_fee' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'service_fee.required' => 'Service Fee Must Not Be Empty',
        ];
    }
}
