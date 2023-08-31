<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdicionarFilmeRequest;
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

    public function criarFilmePost(AdicionarFilmeRequest $request)
    {
        $result = $this->filmesAdminService->criarFilmePost($request);

        if ($result['success']) {
            return redirect()->route('criar-filme-admin')->with('message', 'Filme adicionado com sucesso');
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }


    public function filmesPorCategoria(Request $request)
    {
        $categoria = $request->categoria;

        $data = $this->filmesAdminService->filmesPorCategoria($categoria);

        return view('admin.filmes.filmes-por-categoria', $data);
    }

    public function editarFilme($id)
    {
        $filmeData = $this->filmesAdminService->editarFilme($id);

        return view('admin.filmes.editar-filme', $filmeData);
    }

    public function editarFilmePost(AdicionarFilmeRequest $request)
    {
        $result = $this->filmesAdminService->editarFilmePost($request);

        if (isset($result['success']) && $result['success']) {
            return redirect()->route('home-admin')->with('message', 'Filme editado com sucesso');
        } else if (isset($result['error']) && $result['error']) {
            return redirect()->back()->with('error', $result['message']);
        } else {
            return redirect()->back()->with('error', 'O link fornecido não é do YouTube.');
        }
    }


    public function deletarFilme($id)
    {
        $result = $this->filmesAdminService->deletarFilme($id);

        if ($result) {
            return redirect()->back()->with('message', 'Filme excluído com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Filme não encontrado');
        }
    }

    public function meusFilmes($id)
    {
        $meus_filmes = $this->filmesAdminService->meusFilmes($id);
        $categorias = Categoria::orderBy('nome_categoria')->get();

        return view('admin.filmes.meus-filmes', [
            'filmes' => $meus_filmes,
            'categorias' => $categorias
        ]);
    }

}
