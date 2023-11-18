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
        Schema::create('formulario', function (Blueprint $table) {
               $table->id();
            $table->string("nome")->required();
            $table->string("sobrenome")->required();
            $table->date("nascimento")->required(); // Alteração aqui para definir nascimento como uma coluna de data
            $table->string("email")->unique()->required(); // Adicionando unique para garantir que os e-mails sejam exclusivos
            $table->string("genero")->required();
            $table->string("cpf", 14)->unique()->required();// Adicionando unique para garantir que os CPFs sejam exclusivos
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario');
    }
};
