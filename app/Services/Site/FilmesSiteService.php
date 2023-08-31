<?php

namespace App\Services\Site;

use App\Models\Categoria;
use App\Models\Filme;

class FilmesSiteService
{
    public function filmes()
    {
        return Filme::orderBy('created_at', 'desc')->take(4)->get();
    }

    public function todosFilmes()
    {
        return Filme::orderBy('created_at', 'desc')->paginate(4);
    }

    public function filmesPorCategoria($categoria)
    {
        $filmes = Filme::where('categoria_filme', $categoria)->paginate(6);
        $categorias = Categoria::all();

        return [
            'categoria' => $categoria,
            'filmes' => $filmes,
            'categorias' => $categorias,
        ];
    }

    public function likeFilme(Filme $filme)
    {
        $filme->like_filme += 1;
        $filme->save();
    }

    public function dislikeFilme(Filme $filme)
    {
        $filme->dislike_filme += 1;
        $filme->save();
    }
}
