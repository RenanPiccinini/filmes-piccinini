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
        $categorias = Categoria::orderBy('nome_categoria')->get();

        return $categorias;
    }

    public function criarFilmePost(Request $request)
    {
        $youtubeUrl = $request->link_filme;

        // Verificar se o link fornecido é do YouTube
        if ($this->verificaYoutubeUrl($youtubeUrl)) {
            // Processar o link do YouTube para o formato de incorporação
            $embedLink = $this->converterParaEmbedLink($youtubeUrl);

            // Verificar se o nome do filme já existe no banco
            $filmeExistentePorNome = Filme::where('nome_filme', $request->nome_filme)->first();
            if ($filmeExistentePorNome) {
                return ['success' => false, 'message' => 'O nome do filme já existe.'];
            }

            // Verificar se o link do filme já existe no banco
            $filmeExistentePorLink = Filme::where('link_filme', $embedLink)->first();
            if ($filmeExistentePorLink) {
                return ['success' => false, 'message' => 'O link do filme já existe.'];
            }

            $filme = Filme::create([
                'user_id' => Auth::user()->id,
                'nome_filme' => $request->nome_filme,
                'categoria_filme' => $request->categoria_filme,
                'ano_lancamento_filme' => $request->ano_lancamento_filme,
                'link_filme' => $embedLink,
                'descricao_filme' => $request->descricao_filme,
            ]);

            return ['success' => true, 'message' => 'Filme adicionado com sucesso', 'filme' => $filme];
        } else {
            return ['success' => false, 'message' => 'O link fornecido não é do YouTube.'];
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
        $categorias = Categoria::orderBy('nome_categoria')->get();

        return [
            'categoria' => $categoria,
            'filmes' => $filmes,
            'categorias' => $categorias,
        ];
    }

    public function editarFilme($id)
    {
        $filme = Filme::find($id);
        $categorias = Categoria::orderBy('nome_categoria')->get();

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

            // Verificar se o novo nome do filme já existe no banco (exceto se for o nome atual do filme)
            $filmeExistentePorNome = Filme::where('nome_filme', $request->nome_filme)->where('id', '<>', $id)->first();
            if ($filmeExistentePorNome) {
                return ['error' => true, 'message' => 'O nome do filme já existe.'];
            }

            if ($filme->link_filme !== $embedLink) {
                $filmeExistentePorLink = Filme::where('link_filme', $embedLink)->where('id', '<>', $id)->first();
                if ($filmeExistentePorLink) {
                    return ['error' => true, 'message' => 'O link do filme já existe.'];
                }
            }

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

    public function deletarFilme($id)
    {
        $filme = Filme::find($id);
        if ($filme) {
            $filme->delete();
            return true;
        }
        return false;
    }

    public function meusFilmes($id)
    {
        $meus_filmes = Filme::where('user_id', $id)->get();

        return $meus_filmes;
    }
}
