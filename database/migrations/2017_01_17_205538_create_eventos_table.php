<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id'); // te crea automaticamente la clave primaria
            $table->string('nombre',100);
            $table->string('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('precio_estudiante',6,2);
            $table->decimal('precio_profesional',6,2);
            $table->string('path')->nullable();
            $table->integer('id_categorias')->unsigned()->nullable();
            $table->char('estado',1)->default(1);
            $table->foreign('id_categorias')
                ->references('id')->on('categorias');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
