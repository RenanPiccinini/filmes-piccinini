<?php

namespace App\Services\Admin;

use App\Models\Categoria;
use App\Models\Filme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FilmesAdminService
{
    public function filmes()
    {
        return Filme::paginate(10);
    }

    public function criarFilme()
    {
        $categorias = Categoria::all();

        return $categorias;
    }

    public function criarFilmePost(Request $request)
    {
        $filme = Filme::create([
            'user_id' => Auth::user()->id,
            'nome_filme' => $request->nome_filme,
            'categoria_filme' => $request->categoria_filme,
            'ano_lancamento_filme' => $request->ano_lancamento_filme,
            'descricao_filme' => $request->descricao_filme,
        ]);

        return $filme;
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
