<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('dni');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('codigo');
            $table->string('direccion')->nullable();
            $table->string('imagen_dni')->nullable();
            $table->string('imagen_politicas')->nullable();
            $table->string('nombre_apoderado')->nullable();
            $table->string('celular_apoderado')->nullable();
            $table->string('celular2_apoderado')->nullable();
            $table->string('imagen_documento')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
