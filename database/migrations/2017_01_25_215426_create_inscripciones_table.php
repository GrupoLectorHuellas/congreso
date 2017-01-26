<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->char('validado',1)->default(0);
            $table->char('estado',1)->default(1);
            $table->integer('evento_id')->unsigned();
            $table->string('usuario_id',10)->unsigned();

            $table->foreign('evento_id')->references('id')->on('eventos')
                ->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')
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
        Schema::dropIfExists('inscripciones');
    }
}
