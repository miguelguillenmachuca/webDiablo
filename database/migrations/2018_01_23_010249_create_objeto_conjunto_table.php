<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjetoConjuntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objeto_conjunto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_objeto')->unsigned();
            $table->integer('id_conjunto')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_objeto')->references('id')->on('objeto');
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
        $table->dropForeign('objeto_conjunto_id_conjunto_foreign');
        $table->dropForeign('objeto_conjunto_id_objeto_foreign');

        Schema::dropIfExists('objeto_conjunto');
    }
}
