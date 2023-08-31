<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Filme;
use App\Services\Site\FilmesSiteService;

class SiteController extends Controller
{
    public function __construct(private FilmesSiteService $filmesSiteService)
    {
        $this->filmesSiteService = $filmesSiteService;
    }

    public function home()
    {
        $dez_filmes = Filme::orderBy('created_at', 'desc')->paginate(10);
        $filmes = $this->filmesSiteService->filmes();
        $todos_filmes = $this->filmesSiteService->todosFilmes();
        $categorias = Categoria::orderBy('nome_categoria')->get();

        return view('site.home', [
            'filmes' => $filmes,
            'categorias' => $categorias,
            'todos_filmes' => $todos_filmes,
            'dez_filmes' => $dez_filmes
        ]);
    }
}
