<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContenido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidos', function (Blueprint $table) {
            $table->increments('id'); // te crea automaticamente la clave primaria
            $table->string('subtemas',200);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            //$table->time('hora_inicio');
            //$table->time('hora_fin');
            $table->char('estado',1)->default(1);
            $table->integer('id_temarios')->unsigned()->nullable();
            $table->foreign('id_temarios')
                ->references('id')->on('temario');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('contenidos');
    }
}
