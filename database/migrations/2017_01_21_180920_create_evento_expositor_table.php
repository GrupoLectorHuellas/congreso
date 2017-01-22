<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoExpositorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_expositor', function (Blueprint $table) {
            $table->increments('id'); // te crea automaticamente la clave primaria
            $table->integer('evento_id')->unsigned();
            $table->string('expositor_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos')
                    ->onDelete('cascade');
            $table->foreign('expositor_id')->references('id')->on('expositores')
                    ->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_expositor');
    }
}
