<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreProducto');
            $table->integer('stock');
            $table->float('precio');
            $table->unsignedBigInteger('categoria');
            $table->string('fabricante');
            $table->string('descripcion');
            $table->string('sku');
            $table->integer('garantia');
            $table->string('path_imagen')->nullable();
            $table->foreign('categoria')->references('subcategoria_id')->on('subcategorias')->onDelete('cascade');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
