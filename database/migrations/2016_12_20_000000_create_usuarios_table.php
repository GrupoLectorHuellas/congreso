<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('id');
            $table->string('nacionalidad',50);
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('genero',10);
            $table->string('pais',50);
            $table->string('ciudad',75)->nullable();;
            $table->string('telefono');
            $table->string('direccion',100);
            $table->string('titulo')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('path')->nullable();
            $table->char('estado',1);
            $table->rememberToken();
            $table->integer('id_carreras')->unsigned()->nullable();
            $table->integer('id_cantones')->unsigned()->nullable();
            $table->integer('id_roles')->unsigned();
            $table->primary('id');
            $table->foreign('id_carreras')
                ->references('id')->on('carreras');
            $table->foreign('id_cantones')
                ->references('id')->on('cantones');
            $table->foreign('id_roles')
                ->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
