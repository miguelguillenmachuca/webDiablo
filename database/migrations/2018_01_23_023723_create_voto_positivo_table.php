<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotoPositivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voto_positivo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_guia')->unsigned();
            $table->integer('id_usuario')->unsigned();
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
        $table->dropForeign('voto_positivo_id_usuario_foreign');
        $table->dropForeign('voto_positivo_id_guia_foreign');

        Schema::dropIfExists('voto_positivo');
    }
}
