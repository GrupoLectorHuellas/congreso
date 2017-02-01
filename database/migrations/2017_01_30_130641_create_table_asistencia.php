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
            $table->time('hora_primera_inicial');
            $table->time('hora_primera_final');
            $table->time('hora_segunda_inicial');
            $table->time('hora_segunda_final');
            $table->char('estado',1)->default(1);
            $table->integer('id_asistencia')->unsigned()->nullable();
            $table->foreign('id_asistencia')
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
