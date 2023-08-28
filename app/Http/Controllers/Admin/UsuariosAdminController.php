<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CriarUsuarioRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Services\Admin\UsuariosAdminService;
use Illuminate\Support\Facades\Auth;

class UsuariosAdminController extends Controller
{
    public function __construct(private UsuariosAdminService $usuariosAdminService)
    {
        $this->usuariosAdminService = $usuariosAdminService;
    }

    public function usuarios()
    {
        $categorias = Categoria::all();
        $usuarios = $this->usuariosAdminService->usuarios();

        return view('admin.usuarios.usuarios', [
            'usuarios' => $usuarios,
            'categorias' => $categorias
        ]);
    }

    public function criarUsuario()
    {
        $categorias = Categoria::all();

        return view('admin.usuarios.criar-usuario', [
            'categorias' => $categorias
        ]);
    }

    public function criarUsuarioPost(CriarUsuarioRequest $request)
    {
        $this->usuariosAdminService->criarUsuarioPost($request);

        if(Auth::user()){
            return redirect()->route('usuarios-admin')->with('message', 'Usuário cadastrado com sucesso!');
        }else{
            return redirect()->route('login')->with('message', 'Usuário cadastrado com sucesso, faça seu login!');
        }
    }
}
