<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class CustomEmailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

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
            'type' => 'required', //enum of email_types
            'recipient' => 'required|string|max:512',
            'subject' => 'required|string|max:255',
            'content' => 'required|max:10000',
        ];
    }

    public function updateRules(): array
    {

        return [
            'type' => 'required', //enum of email_types
            'recipient' => 'required|string|max:512',
            'subject' => 'required|string|max:255',
            'content' => 'required|max:10000',
            'user_id' => 'required|integer'
        ];
    }
}
