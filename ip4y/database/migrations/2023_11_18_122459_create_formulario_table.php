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
            $table->date("nascimento")->required(); 
            $table->string("email")->unique()->required();
            $table->string("genero")->required();
            $table->string("cpf", 14)->unique()->required();
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
