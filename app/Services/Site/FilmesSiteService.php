<?php

namespace App\Services\Site;

use App\Models\Categoria;
use App\Models\Filme;

class FilmesSiteService
{
    public function filmes()
    {
        return Filme::orderBy('created_at', 'desc')->take(6)->get();
    }

    public function filmesPorCategoria($categoria)
    {
        $filmes = Filme::where('categoria_filme', $categoria)->paginate(10);
        $categorias = Categoria::all();

        return [
            'categoria' => $categoria,
            'filmes' => $filmes,
            'categorias' => $categorias,
        ];
    }
}
