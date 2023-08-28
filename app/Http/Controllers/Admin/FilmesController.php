<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Filme;
use App\Services\Admin\FilmesAdminService;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function __construct(private FilmesAdminService $filmesAdminService)
    {
        $this->filmesAdminService = $filmesAdminService;
    }

    public function criarFilme()
    {
        $categorias = $this->filmesAdminService->criarFilme();

        return view('admin.filmes.criar-filme', [
            'categorias' => $categorias
        ]);
    }

    public function criarFilmePost(Request $request)
    {
        $this->filmesAdminService->criarFilmePost($request);

        return redirect()->route('criar-filme-admin')->with('message', 'Filme adicionado com sucesso');
    }

    public function filmesPorCategoria(Request $request)
    {
        $categoria = $request->categoria;

        $data = $this->filmesAdminService->filmesPorCategoria($categoria);

        return view('admin.filmes.filmes-por-categoria', $data);
    }

}
