<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia_objeto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_guia')->unsigned();
            $table->integer('id_objeto')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_guia')->references('id')->on('guia');
            $table->foreign('id_objeto')->references('id')->on('objeto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('guia_obejto_id_objeto_foreign');
        $table->dropForeign('guia_objeto_id_guia_foreign');

        Schema::dropIfExists('guia_objeto');
    }
}
