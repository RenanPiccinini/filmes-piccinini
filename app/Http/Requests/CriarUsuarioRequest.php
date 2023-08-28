<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarUsuarioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/',
            'telefone' => 'required|min:14',
            'foto' => 'required',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            ],
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'Nome precisa ser completo',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.regex' => 'O formato do e-mail é inválido. Certifique-se de que ele contenha um "@" e um "." após o "@".',
            'telefone.required' => 'O campo Telefone é obrigatório',
            'telefone.min' => 'O telefone deve ter 11 dígitos',
            'foto.required' => 'O campo foto é obrigatório',
            'password.required' => 'Senha é obrigatória.',
            'password.regex' => 'A senha deve ter pelo menos 8 caracteres, uma letra maiúscula, uma letra minúscula, um número e um caracter especial.',
            'password.confirmed' => 'Confirmação de senha não é válida.',
            'password_confirmation.required' => 'Confirmação de senha é obrigatória.'
        ];
    }
}
