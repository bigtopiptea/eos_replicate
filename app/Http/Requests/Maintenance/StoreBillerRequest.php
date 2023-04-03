<?php

namespace App\Http\Requests\Maintenance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        if ($this->isMethod('post')) {
            return $this->createRules();
        } elseif ($this->isMethod('put')) {
            return $this->updateRules();
        }
    }

    public function createRules(){
        return [
            'meta_value' => 'required|unique:maintenances',
        ];

    }

    public function updateRules(){
        return [
            'meta_value' => ['required', Rule::unique('maintenances')->ignore($this->route('id'))],
        ];
    }

    public function messages()
    {
        return [
            'meta_value.required' => 'Category field is required.',
            'meta_value.unique' => $this->meta_value . " " . 'Category is Already exists.',
        ];
    }
}
