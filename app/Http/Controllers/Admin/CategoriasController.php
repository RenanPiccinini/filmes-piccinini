<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Services\Admin\CategoriasAdminService;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function __construct(private CategoriasAdminService $categoriasAdminService)
    {
        $this->categoriasAdminService = $categoriasAdminService;
    }

    public function categorias()
    {
        $categorias = $this->categoriasAdminService->categorias();

        return view('admin.categorias.categorias', [
            'categorias' => $categorias
        ]);
    }

    public function criarCategoria()
    {
        $categorias = Categoria::all();

        return view('admin.categorias.criar-categoria', [
            'categorias' => $categorias
        ]);
    }

    public function criarCategoriaPost(Request $request)
    {
        $this->categoriasAdminService->criarCategoriaPost($request);

        return redirect()->route('categorias-admin')->with('message', 'Categoria adicionada com sucesso.');
    }

    public function excluirCategoria($id)
    {
        $this->categoriasAdminService->excluirCategoria($id);

        return redirect()->route('categorias-admin')->with('message', 'Categoria excluída com sucesso.');
    }
}
