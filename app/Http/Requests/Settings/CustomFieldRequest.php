<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class CustomFieldRequest extends FormRequest
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
            'parent_id' => $this->parent_id ? 'required' :  '',
            'source_of_funds' => $this->source_of_funds ? 'required' : '',
            'ref' => 'required',
            'fields' => 'required|array|min:1',
            'fields.*.type' => 'required',
            'fields.*.label' => 'required',
            'fields.*.name' => $this->parent_id ? ' required' : '',
            'fields.*.range' => $this->parent_id ? ' required' : '',
            'fields.*.tags' => $this->type === 'select' ? 'required' : '',
            'fields.*.tags.*' => $this->type === 'select' ? 'required' : '',
            'fields.*.require' => 'required',
        ];
    }

    public function updateRules(): array
    {
        return [
            'parent_id' => $this->parent_id ? 'required' :  '',
            'source_of_funds' => $this->source_of_funds ? 'required' : '',
            'ref' => 'required|max:30',
            'name' => $this->source_of_funds ? 'required|string|unique:maintenances,id,' . $this->get('id') : '',
            'fields' => 'required|array|min:1',
            'fields.*.type' => 'required',
            'fields.*.label' => 'required',
            'fields.*.name' => $this->parent_id ? ' required' : '',
            'fields.*.range' => $this->parent_id ? ' required' : '',
            'fields.*.tags' => $this->type === 'select' ? 'required' : '',
            'fields.*.tags.*' => $this->type === 'select' ? 'required' : '',
            'fields.*.require' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'source_of_funds.required' => 'Source of fund is required.',
            'fields.required' => 'Custom fields need at least one item.',
            'fields.*.type' => 'Field type is required',
            'fields.*.label.required' => 'Label name is required.',
            'fields.*.require.required' => 'Is it Mandatory?',
        ];
    }
}
