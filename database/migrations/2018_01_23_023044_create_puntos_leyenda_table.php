<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntosLeyendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos_leyenda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_guia')->unsigned();
            $table->enum('estadistica', ['estad_principal', 'vitalidad', 'v_movimiento', 'recurso_max', 'v_ataque', 'reduccion_enfr', 'prob_golpe_crit', 'vida', 'armadura', 'todas_resist', 'regeneracion_vida', 'dano_area', 'reduc_coste_recur', 'vida_por_golpe', 'hallazgo_oro']);
            $table->enum('prioridad', ['1', '2', '3', '4']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_guia')->references('id')->on('guia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('puntos_leyenda_id_guia_foreign');

        Schema::dropIfExists('puntos_leyenda');
    }
}
