<?php

namespace App\Http\Requests\Maintenance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends FormRequest
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

    public function createRules(): array {
        return [
            'meta_id' => 'required|unique:maintenances',
            'meta_value' => 'required|unique:maintenances',
        ];
    }

    public function updateRules(): array {
        return [
            'meta_id' => ['required', Rule::unique('maintenances')->ignore($this->route('id'))],
            'meta_value' => ['required', Rule::unique('maintenances')->ignore($this->route('id'))],
        ];
    }

    public function messages()
    {
        return [
            'meta_id.required' => 'Abbrevation field is required',
            'meta_value.required' => 'Transaction Type field is required',
            'meta_id.unique' => 'Abbrevation already exists.',
            'meta_value.unique' => 'Transaction Type already exists.',
        ];
    }
}
