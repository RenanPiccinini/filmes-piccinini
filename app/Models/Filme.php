<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome_filme',
        'categoria_filme',
        'ano_lancamento_filme',
        'descricao_filme',
        'like_filme',
        'dislike_filme'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
