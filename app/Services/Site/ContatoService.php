<?php

namespace App\Services\Site;

use App\Http\Requests\ContatoRequest;
use App\Models\Categoria;
use App\Models\Contato;
use App\Models\Filme;

class ContatoService
{
    public function contato()
    {
        $categorias = Categoria::all();

        return $categorias;
    }

    public function contatoPost(ContatoRequest $request)
    {
        $contato = Contato::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'mensagem' => $request->mensagem
        ]);
    }
}
