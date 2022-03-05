<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('inicio_id');
            $table->unsignedBigInteger('ciclo_id')->nullable();
            $table->unsignedBigInteger('modalidad_id')->nullable();
            $table->unsignedBigInteger('carrera_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('inicio_id')
                ->references('id')
                ->on('inicios');

            $table->foreign('ciclo_id')
                ->references('id')
                ->on('ciclos');

            $table->foreign('modalidad_id')
                ->references('id')
                ->on('modalidads');

            $table->foreign('carrera_id')
                ->references('id')
                ->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
