<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEfectosConjuntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('efectos_conjunto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_conjunto')->unsigned();
            $table->tinyInteger('num_requisito')->unsigned();
            $table->string('efecto', 75);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_conjunto')->references('id')->on('conjunto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('efectos_conjunto_id_conjunto_foreign');
        
        Schema::dropIfExists('efectos_conjunto');
    }
}
