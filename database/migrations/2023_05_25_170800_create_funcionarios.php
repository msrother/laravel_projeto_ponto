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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);          
            $table->string('email',100);
            $table->string('cpf',11);
            $table->unsignedBigInteger('cidade_id');
            $table->unsignedBigInteger('cargo_id');           
            $table->timestamps();    
            
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->foreign('cargo_id')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
