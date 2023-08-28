<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;

class AdminController extends Controller
{
    public function __construct(private AdminService $adminservice)
    {
        $this->adminservice = $adminservice;
    }

    public function home()
    {
        return view('admin.home');
    }

    public function logout()
    {
        $this->adminservice->logout();

        return redirect()->route('login');
    }
}
