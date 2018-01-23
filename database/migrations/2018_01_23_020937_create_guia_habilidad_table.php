<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaHabilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia_habilidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_habilidad')->unsigned();
            $table->integer('id_runa')->unsigned();
            $table->enum('posicion', ['a1', 'a2', 'a3', 'a4', 'a5', 'a6', 'p1', 'p2', 'p3', 'p4']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_habilidad')->references('id')->on('habilidad');
            $table->foreign('id_runa')->references('id')->on('runa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('guia_habilidad_id_runa_foreign');
        $table->dropForeign('guia_habilidad_id_habilidad_foreign');
        
        Schema::dropIfExists('guia_habilidad');
    }
}
