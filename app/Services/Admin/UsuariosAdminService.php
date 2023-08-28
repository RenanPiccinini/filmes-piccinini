<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosAdminService
{
    public function usuarios()
    {
        return User::paginate(10);
    }

    public function criarUsuarioPost(Request $request)
    {
        $cadastroFoto = $request->all();

       if($request->file('foto')){
           $foto = $this->uploadFile($request, 'perfil-usuarios', 'foto');

           $cadastroFoto["foto"] = $foto;
       }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'foto' => $cadastroFoto["foto"],
            'password' => Hash::make($request->password),
        ]);

        return $user;
    }

    public function uploadFile($request, $folder, $fileInputName)
    {
        // Define o valor default para a variável que contém o nome do arquivo
        $nameFile = null;

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile($fileInputName) && $request->file($fileInputName)->isValid()) {

            // Define um nome aleatório para o arquivo baseado no timestamps atual
            $name = $fileInputName ."-". uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->$fileInputName->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->$fileInputName->storeAs("public/". $folder, $nameFile);
        }

        // Retorna o nome do arquivo gerado
        return $nameFile;
    }

}
