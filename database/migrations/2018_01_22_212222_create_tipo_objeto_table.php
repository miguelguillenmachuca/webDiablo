<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_objeto', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre', 50);
          $table->integer('id_clase')->nullable()->unsigned();
          $table->enum('categoria_obj', ['cabeza', 'hombros', 'torso', 'munecas', 'manos', 'cintura', 'piernas', 'pies', 'mano_izquierda', 'una_mano', 'dos_manos', 'a_distancia', 'anillo', 'amuleto', 'gema']);
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
        $table->dropForeign('tipo_objeto_id_clase_foreign');

        Schema::dropIfExists('tipo_objeto');
    }
}
