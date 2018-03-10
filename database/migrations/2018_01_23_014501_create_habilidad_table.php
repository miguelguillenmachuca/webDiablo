<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->enum('tipo_habilidad', ['activa', 'pasiva']);
            $table->integer('id_clase')->unsigned();
            $table->string('descripcion', 1000);
            $table->string('foto_habilidad', 254)->default('img/habilidades/default_skill.png');
            $table->timestamps();
            $table->softDeletes();

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
        $table->dropForeign('habilidad_id_clase_foreign');

        Schema::dropIfExists('habilidad');
    }
}
