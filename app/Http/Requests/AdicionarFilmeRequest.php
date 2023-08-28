<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdicionarFilmeRequest extends FormRequest
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
            'nome_filme' => 'required',
            'categoria_filme' => 'required',
            'ano_lancamento_filme' => 'required',
            'descricao_filme' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome_filme.required' => 'O nome do filme é obrigatório',
            'categoria_filme.required' => 'A categoria do filme é obrigatória.',
            'ano_lancamento_filme.required' => 'O Ano de lançamento do filme é obrigatório',
            'descricao_filme.required' => 'Breve descrição do filme é obrigatória.'
        ];
    }
}
