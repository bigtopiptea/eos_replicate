<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'role' => 'required',
            'user_name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'middle_name' => 'required|string|max:100',
            'suffix' => 'required',
            'mobile_number' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'company_id' => 'required',
            'branch_id' => 'required',
            'status' => 'required',
            'access' => 'required',
            'avatar' => ['base64image:png, jpg, jpeg'],
        ];
    }

    public function updateRules(): array
    {
        return [
            'role' => 'required',
            'user_name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'middle_name' => 'required|string|max:100',
            'suffix' => 'required',
            'mobile_number' => 'required|string|max:100',
            'email' => 'sometimes|string|email|max:191|unique:users,email,' . $this->get('id'),
            'company_id' => 'required',
            'branch_id' => 'required',
            'access' => 'required',
            'status' => 'required',
            'avatar' => ['base64image:png, jpg, jpeg'],
        ];
    }

    public function messages()
    {
        return [
            'role.required' => 'Role is required.',
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'company_id.value.required' => 'Company is required.',
            'branch_id.required' => 'Branch is required.',
            'email.required' => 'Email is required.',
            'mobile_number.required' => 'Mobile Number is required.',
            'user_name.required' => 'Username is required.',
            'access.required' => 'Select at least 1 module access.',
        ];
    }
}