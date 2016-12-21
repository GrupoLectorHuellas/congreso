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
            $table->string('id',10);
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('ciudad',25);
            $table->string('telefono',10);
            $table->integer('id_facultades')->unsigned()->nullable();
            $table->string('titulo')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->char('estado',1);
            $table->rememberToken();
            $table->primary('id');
            $table->foreign('id_facultades')
                ->references('id')->on('facultades');
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
