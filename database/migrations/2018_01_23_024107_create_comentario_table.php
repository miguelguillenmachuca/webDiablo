<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_guia')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->string('texto', 1000);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_guia')->references('id')->on('guia');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('comentario_id_usuario_foreign');
        $table->dropForeign('comentario_id_guia_foreign');

        Schema::dropIfExists('comentario');
    }
}
