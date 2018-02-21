<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_habilidad')->unsigned();
            $table->string('nombre', 50);
            $table->string('descripcion', 200)->default('Descripción');
            $table->string('foto_runa', 254)->default('runas/default_rune.png');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_habilidad')->references('id')->on('habilidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('runa_id_habilidad_foreign');

        Schema::dropIfExists('runa');
    }
}
