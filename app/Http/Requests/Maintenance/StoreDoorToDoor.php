<?php

namespace App\Http\Requests\Maintenance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDoorToDoor extends FormRequest
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

    public function createRules(): array{
        return [
            'name' => 'required|unique:billers',
            'provider' => 'required',
        ];
    }

    public function updateRules(): array{
        return [
            'name' => ['required', Rule::unique('billers')->ignore($this->id)],
            'provider' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.unique' => 'Name is already exists.',
            'provider.required' => 'Provider field is required'
        ];
    }
}
