<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEfectosLegendariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('efectos_legendarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_objeto')->unsigned();
            $table->string('efecto_objeto', 200);
            $table->timestamps();
            $table->softDeletes();

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
        $table->dropForeign('efectos_legendarios_id_objeto_foreign');
        
        Schema::dropIfExists('efectos_legendarios');
    }
}
