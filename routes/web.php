<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\FilmesController;
use App\Http\Controllers\Admin\UsuariosAdminController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\SiteFilmesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Site
Route::get('/', [SiteController::class, 'home'])->name('home-site');
Route::get('/site/filmes/{categoria}', [SiteFilmesController::class, 'filmesPorCategoria'])->name('site-filmes-listar-por-categoria');
Route::get('/contato', [ContatoController::class, 'contato'])->name('contato-site');
Route::post('/contato-post', [ContatoController::class, 'contatoPost'])->name('contato-site-post');

//like
Route::post('/like-filme/{filme}', [SiteFilmesController::class, 'likeFilme'])->name('like-filme');
Route::post('/dislike-filme/{filme}', [SiteFilmesController::class, 'dislikeFilme'])->name('dislike-filme');

Auth::routes();

//Admin
Route::post('/admin-criar-usuario-post', [UsuariosAdminController::class, 'criarUsuarioPost'])->name('criar-usuario-admin-post');

Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [AdminController::class, 'home'])->name('home-admin');
    Route::post('/logout-admin', [AdminController::class, 'logout'])->name('admin-logout');

    //usuários
    Route::get('/admin-usuarios', [UsuariosAdminController::class, 'usuarios'])->name('usuarios-admin');
    Route::get('/admin-criar-usuario', [UsuariosAdminController::class, 'criarUsuario'])->name('criar-usuario-admin');

    //categorias
    Route::get('/admin-categorias', [CategoriasController::class, 'categorias'])->name('categorias-admin');
    Route::get('/admin-criar-categoria', [CategoriasController::class, 'criarCategoria'])->name('criar-categoria-admin');
    Route::post('/admin-criar-categoria-post', [CategoriasController::class, 'criarCategoriaPost'])->name('criar-categoria-admin-post');
    Route::delete('/admin-excluir-categoria/{id}', [CategoriasController::class, 'excluirCategoria'])->name('excluir-categoria-admin');

    //filmes
    Route::get('/admin-criar-filme', [FilmesController::class, 'criarFilme'])->name('criar-filme-admin');
    Route::post('/admin-criar-filme-post', [FilmesController::class, 'criarFilmePost'])->name('criar-filme-admin-post');
    Route::get('/filmes/{categoria}', [FilmesController::class, 'filmesPorCategoria'])->name('filmes-listar-por-categoria');
    Route::get('/admin-editar-filme/{id}', [FilmesController::class, 'editarFilme'])->name('editar-filme-admin');
    Route::post('/admin-editar-filme-post/{id}', [FilmesController::class, 'editarFilmePost'])->name('editar-filme-admin-post');
    Route::delete('/admin-delete-filme/{id}', [FilmesController::class, 'deletarFilme'])->name('deletar-filme');
    Route::get('/admin-meus-filmes/{id}', [FilmesController::class, 'meusFilmes'])->name('meus-filmes');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
