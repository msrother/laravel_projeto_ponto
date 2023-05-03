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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->float('valor');
            $table->date('validade');
            $table->timestamps();
        });

        // COM CHAVE ESTRANGEIRA

        // Schema::create('produtos', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nome');
        //     $table->float('valor');
        //     $table->date('validade');
        //     $table->unsignedBigInteger('categoria_id');
        //     $table->timestamps();
    
        //     $table->foreign('categoria_id')->references('id')->on('categorias');
        // });

        // Schema::table('produtos', function (Blueprint $table) {
        //     $table->unsignedBigInteger('categoria_id');
        //     $table->foreign('categoria_id')->references('id')->on('categorias');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
