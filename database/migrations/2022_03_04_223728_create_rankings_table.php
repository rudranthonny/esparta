<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            $table->string('nota')->nullable();
            $table->string('puesto')->nullable();
            $table->unsignedBigInteger('matricula_id');
            $table->unsignedBigInteger('examen_id');
            $table->timestamps();

            $table->foreign('matricula_id')
                ->references('id')
                ->on('matriculas');

            $table->foreign('examen_id')
                ->references('id')
                ->on('examens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rankings');
    }
}
