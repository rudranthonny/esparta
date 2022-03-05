<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIniciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inicios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('anio');
            $table->string('link');
            $table->unsignedBigInteger('tipo_inicio_id');
            $table->unsignedBigInteger('turno_id');
            $table->timestamps();

            $table->foreign('tipo_inicio_id')
                ->references('id')
                ->on('tipo_inicios');

            $table->foreign('turno_id')
                ->references('id')
                ->on('turnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inicios');
    }
}
