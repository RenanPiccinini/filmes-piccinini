<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //Usuário que adicionou o filme
            $table->string('nome_filme');
            $table->string('categoria_filme');
            $table->string('ano_lancamento_filme');
            $table->string('descricao_filme');
            $table->string('link_filme');
            $table->string('like_filme');
            $table->string('dislike_filme');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
