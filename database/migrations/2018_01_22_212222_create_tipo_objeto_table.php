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
          $table->enum('categoria_obj', ['cabeza', 'hombros', 'torso', 'munecas', 'manos', 'cintura', 'piernas', 'pies', 'mano_izquierda', 'una_mano', 'dos_manos', 'a_distancia', 'anillo', 'amuleto', 'gema']);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_objeto');
    }
}
