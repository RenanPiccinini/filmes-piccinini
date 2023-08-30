<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
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
}
