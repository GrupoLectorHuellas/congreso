<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpositoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expositores', function (Blueprint $table) {
            $table->string('id');
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('experiencia_laboral');
            $table->string('titulo')->nullable();
            $table->string('email')->unique();
            $table->string('path')->nullable();
            $table->char('estado',1)->default(1);
            $table->primary('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expositores');
    }
}
