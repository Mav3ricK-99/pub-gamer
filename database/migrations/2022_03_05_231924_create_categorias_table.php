<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('categoria_id');
            $table->string('nombre');

        });

        Schema::create('subcategorias', function (Blueprint $table) {
            $table->id('subcategoria_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('nombre');

            $table->foreign('categoria_id')->references('categoria_id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('subcategorias');
    }
};