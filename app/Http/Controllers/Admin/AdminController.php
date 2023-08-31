<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Filme;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        $categorias = Categoria::all();
        $filmes = Filme::all();
        $usuarios = User::all();

        return view('admin.home', [
            'categorias' => $categorias,
            'filmes' => $filmes,
            'usuarios' => $usuarios
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
