<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/',
            'telefone' => 'required|min:15|max:15',
            'mensagem' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo Nome é obrigatório',
            'email.required' => 'Campo E-mail é obrigatório',
            'email.regex' => 'O formato do e-mail é inválido. Certifique-se de que ele contenha um "@" e um "." após o "@".',
            'telefone.required' => 'Campo Telefone é obrigatório',
            'telefone.min' => 'Telefone precisa conter 11 digitos com DDD',
            'telefone.max' => 'Telefone precisa conter 11 digitos com DDD',
            'mensagem.required' => 'Campo Mensagem é obrigatório',
            'mensagem.min' => 'Mensagem precisa ter no mínimo 10 caracteres'
        ];
    }
}
