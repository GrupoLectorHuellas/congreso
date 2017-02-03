<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAsistencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->increments('id'); // te crea automaticamente la clave primaria
            $table->date('fecha');
            $table->time('hora_primera_inicial')->nullable();
            $table->time('hora_primera_final')->nullable();
            $table->time('hora_segunda_inicial')->nullable();
            $table->time('hora_segunda_final')->nullable();
            $table->char('estado',1)->default(1);
            $table->integer('id_inscripciones')->unsigned()->nullable();
            $table->foreign('id_inscripciones')
                ->references('id')->on('inscripciones');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencia');
    }
}
