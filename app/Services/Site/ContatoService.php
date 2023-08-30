<?php

namespace App\Services\Site;

use App\Http\Requests\ContatoRequest;
use App\Mail\SiteContatoMail;
use App\Models\Categoria;
use App\Models\Contato;
use App\Models\Filme;
use Illuminate\Support\Facades\Mail;

class ContatoService
{
    public function contato()
    {
        $categorias = Categoria::all();

        return $categorias;
    }

    public function contatoPost(ContatoRequest $request)
    {
        $contato = Contato::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'mensagem' => $request->mensagem
        ]);

        $this->email($contato);
    }

    public function email(Contato $contato)
    {
        // enviando email
        $dataMail['assunto'] =  "Mensagem do formulário de contato Youtube Filmes Piccinini";
        $dataMail['from_nome'] = $contato->name;
        $dataMail['from_email'] = $contato->email;
        $dataMail['from_phone'] = $contato->telefone;
        $dataMail['from_message'] = $contato->mensagem;
        $dataMail['to_email'] = env('MAIL_FROM_ADDRESS');
        Mail::to($dataMail['to_email'])
            ->send(new SiteContatoMail((object) $dataMail));
        // fim enviando email

        // enviando email para cliente
        $dataMail['assunto'] =  "Recebi sua mensagem com sucesso. Em breve responderei, muito obrigado pelo contato!";
        $dataMail['from_nome'] = env('MAIL_FROM_NAME');
        $dataMail['from_email'] = env('MAIL_FROM_ADDRESS');
        $dataMail['to_email'] = $contato->email;
        Mail::to($dataMail['to_email'])
            ->send(new SiteContatoMail((object) $dataMail));
        // fim enviando email para cliente
    }

}
