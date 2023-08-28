<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
