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
        Schema::create('comentarios', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->foreignUuid('user_id')->constrained('users');
            $table->string('mensaje');
            $table->uuidMorphs('comentable');
            /* $table->foreignId('respuesta_id')->nullable()->constrained('comentarios')->onDelete('cascade');
            $table->foreignUuid('publicacion_id')->constrained('publicaciones'); */
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
        //
    }
};
