<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'identity' => 'required',
            'password' => 'required',
            'code' => 'required|same:generated_code',
        ];
    }

    public function messages()
    {
        return [
            'identity.required' => 'Username field is required.',
            'password.required' => 'Password field is required',
            'code.required' => 'Code field is required',
            'code.same' => 'Same only'
        ];
    }
}
