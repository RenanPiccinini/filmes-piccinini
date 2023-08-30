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
        $youtubeUrl = $request->link_filme;

        // Verificar se o link fornecido é do YouTube
        if ($this->verificaYoutubeUrl($youtubeUrl)) {
            // Processar o link do YouTube para o formato de incorporação
            $embedLink = $this->converterParaEmbedLink($youtubeUrl);

            $filme = Filme::create([
                'user_id' => Auth::user()->id,
                'nome_filme' => $request->nome_filme,
                'categoria_filme' => $request->categoria_filme,
                'ano_lancamento_filme' => $request->ano_lancamento_filme,
                'link_filme' => $embedLink, // Armazenar o link de incorporação
                'descricao_filme' => $request->descricao_filme,
            ]);

            return ['success' => true, 'filme' => $filme];
        } else {
            return ['success' => false];
        }
    }

    // Função para verificar se um URL é do YouTube
    private function verificaYoutubeUrl($url)
    {
        return (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false);
    }

    // Função para converter qualquer link do YouTube para o formato de incorporação
    private function converterParaEmbedLink($youtubeUrl)
    {
        $parsedUrl = parse_url($youtubeUrl);

        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $query);

            if (isset($query['v'])) {
                $videoId = $query['v'];
                return "https://www.youtube.com/embed/{$videoId}";
            }
        }

        // Retornar o link original caso não seja possível extrair o ID do vídeo
        return $youtubeUrl;
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

    public function editarFilme($id)
    {
        $filme = Filme::find($id);
        $categorias = Categoria::all();

        return [
            'categorias' => $categorias,
            'filme' => $filme,
        ];
    }

    public function editarFilmePost(Request $request)
    {
        $youtubeUrl = $request->link_filme;

        // Verificar se o link fornecido é do YouTube
        if ($this->verificaYoutubeUrl($youtubeUrl)) {
            // Processar o link do YouTube para o formato de incorporação
            $embedLink = $this->converterParaEmbedLink($youtubeUrl);

            $id = $request->input('id');
            $filme = Filme::find($id);

            $filme->nome_filme = $request->nome_filme;
            $filme->categoria_filme = $request->categoria_filme;
            $filme->ano_lancamento_filme = $request->ano_lancamento_filme;
            $filme->descricao_filme = $request->descricao_filme;
            $filme->link_filme = $embedLink;

            $filme->update();

            return ['success' => true, 'filme' => $filme];
        } else {
            return ['success' => false];
        }
    }

}
