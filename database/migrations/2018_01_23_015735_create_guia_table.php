<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 70);
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_clase')->unsigned();
            $table->string('descripcion', 1000)->nullable();
            $table->enum('visibilidad', ['publica', 'privada']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_clase')->references('id')->on('clase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('guia_id_clase_foreign');
        $table->dropForeign('guia_id_usuario_foreign');

        Schema::dropIfExists('guia');
    }
}
