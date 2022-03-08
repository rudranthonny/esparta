<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
//ruta de Administrador
Route::get('',[HomeController::class,'index'])->name('admin.home');
//controlador Estudiante
Route::resource('estudiantes',EstudianteController::class)->names('admin.estudiantes');