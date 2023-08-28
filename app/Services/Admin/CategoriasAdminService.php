<?php

namespace App\Services\Admin;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriasAdminService
{
    public function categorias()
    {
        return Categoria::all();
    }

    public function criarCategoriaPost(Request $request)
    {
        $categoria = Categoria::create([
            'nome_categoria' => $request->nome_categoria
        ]);

        return $categoria;
    }

    public function excluirCategoria($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
    }

}
