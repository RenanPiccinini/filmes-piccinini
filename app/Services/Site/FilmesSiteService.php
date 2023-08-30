<?php

namespace App\Services\Site;

use App\Models\Filme;

class FilmesSiteService
{
    public function filmes()
    {
        return Filme::orderBy('created_at', 'desc')->take(6)->get();
    }
}
