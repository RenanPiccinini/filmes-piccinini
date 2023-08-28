<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;

class AdminService
{
    public function logout()
    {
        Auth::logout();
    }
}
