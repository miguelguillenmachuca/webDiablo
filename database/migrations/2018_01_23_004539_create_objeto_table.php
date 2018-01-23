<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objeto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->integer('id_clase')->unsigned()->nullable();
            $table->integer('tipo_objeto')->unsigned();
            $table->enum('rareza', ['legendario', 'conjunto']);
            $table->string('foto_objeto')->default('objetos/default_item.png');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_clase')->references('id')->on('clase');
            $table->foreign('tipo_objeto')->references('id')->on('tipo_objeto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('objeto_tipo_objeto_foreign');
        $table->dropForeign('objeto_id_clase_foreign');

        Schema::dropIfExists('objeto');
    }
}
