<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContatoRequest;
use App\Models\Categoria;
use App\Services\Site\ContatoService;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function __construct(private ContatoService $contatoService)
    {
        $this->contatoService = $contatoService;
    }

    public function contato()
    {
        $categorias = $this->contatoService->contato();

        return view('site.contato.contato', [
            'categorias' => $categorias
        ]);
    }

    public function contatoPost(ContatoRequest $request)
    {
        $this->contatoService->contatoPost($request);

        return redirect()->route('contato-site')->with('message', 'Mensagem enviada com sucesso em breve responderemos!');
    }
}
