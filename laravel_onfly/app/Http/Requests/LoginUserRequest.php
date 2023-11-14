<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email' => ['required','string','email', 'max:60', 'unique:users'],
            'password' => ['required','string', 'min:6', 'max:20'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O e-mail é obrigatório'.PHP_EOL,
            'email.unique' => 'O e-mail já foi cadastrado!'.PHP_EOL,
            'email.email' => 'O e-mail é inváido'.PHP_EOL,
            'email.unique' => 'O e-mail já foi cadastrado'.PHP_EOL,
            'password.required' => 'A senha é obrigatoria'.PHP_EOL,
            'password.min' => 'A senha deve conter no minimo 6 caracteres'.PHP_EOL,
            'password.max' => 'A senha deve conter no maximo 20 caracteres'.PHP_EOL
        ];
    } 

}