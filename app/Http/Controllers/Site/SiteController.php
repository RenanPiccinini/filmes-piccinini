<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Site\FilmesSiteService;

class SiteController extends Controller
{
    public function __construct(private FilmesSiteService $filmesSiteService)
    {
        $this->filmesSiteService = $filmesSiteService;
    }

    public function home()
    {
        $filmes = $this->filmesSiteService->filmes();

        return view('site.home', [
            'filmes' => $filmes
        ]);
    }
}
