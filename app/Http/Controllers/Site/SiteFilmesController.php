<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Filme;
use App\Services\Site\FilmesSiteService;
use Illuminate\Http\Request;

class SiteFilmesController extends Controller
{
    public function __construct(private FilmesSiteService $filmesSiteService)
    {
        $this->filmesSiteService = $filmesSiteService;
    }

    public function filmesPorCategoria(Request $request)
    {
        $categoria = $request->categoria;

        $data = $this->filmesSiteService->filmesPorCategoria($categoria);

        return view('site.filmes.filmes-por-categoria', $data);
    }

    public function likeFilme(Filme $filme)
    {
        $this->filmesSiteService->likeFilme($filme);

        return redirect()->back()->with('success', 'Filme curtido com sucesso!');
    }

    public function dislikeFilme(Filme $filme)
    {
        $this->filmesSiteService->dislikeFilme($filme);

        return redirect()->back()->with('success', 'Filme descurtido com sucesso!');
    }
}
