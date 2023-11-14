<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpensesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user' => ['required'],
            'description' => ['required','string'],
            'date' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'user.required' => 'O usuario é obrigatório'.PHP_EOL,
            'description.required' => 'A descrição é obrigatório'.PHP_EOL,
            'date.required' => 'A data é obrigatório'.PHP_EOL,
        ];
    } 
}