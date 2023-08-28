<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Site\SiteController;
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

Auth::routes();

//Admin

Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [AdminController::class, 'home'])->name('home-admin');
    Route::post('/logout-admin', [AdminController::class, 'logout'])->name('admin.logout');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
