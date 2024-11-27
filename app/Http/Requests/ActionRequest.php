<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'actions.*.exist' => 'boolean',
            'actions.*.pages' => 'integer|min:0',
            'actions.*.hadiths' => 'integer|min:0',
            'actions.*.clothes' => 'boolean',
            'actions.*.noisy' => 'boolean',
            'actions.*.gift' => 'integer|min:0',

        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $actions = $this->input('actions', []);
        
        foreach ($actions as $student_id => $actionData) {
            $actions[$student_id] = array_merge([
                'exist' => false,
                'pages' => 0,
                'hadiths' => 0,
                'clothes' => false,
                'noisy' => false,
                'gift' => 0,

            ], $actionData);
        }

        $this->merge(['actions' => $actions]);
    }
}
