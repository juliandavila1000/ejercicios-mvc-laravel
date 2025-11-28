<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Exercise1Controller;
use App\Http\Controllers\Exercise2Controller;
use App\Http\Controllers\Exercise3Controller;
use App\Http\Controllers\Exercise4Controller;
use App\Http\Controllers\Exercise5Controller;
use App\Http\Controllers\Exercise6Controller;
use App\Http\Controllers\Exercise7Controller;
use App\Http\Controllers\Exercise8Controller;
use App\Http\Controllers\Exercise9Controller;
use App\Http\Controllers\Exercise10Controller;
use App\Http\Controllers\Exercise11Controller;

// Página de inicio
Route::get('/', function () {
    return view('home');
})->name('home');

// Ejercicio 1: Lista de Tareas
Route::get('/exercise1', [Exercise1Controller::class, 'index'])->name('exercise1.index');
Route::post('/exercise1/agregar', [Exercise1Controller::class, 'agregar'])->name('exercise1.agregar');
Route::post('/exercise1/eliminar', [Exercise1Controller::class, 'eliminar'])->name('exercise1.eliminar');
Route::post('/exercise1/completar', [Exercise1Controller::class, 'completar'])->name('exercise1.completar');

// Ejercicio 2: Calculadora de Propinas
Route::match(['get', 'post'], '/exercise2', [Exercise2Controller::class, 'index'])->name('exercise2.index');

// Ejercicio 3: Generador de Contraseñas
Route::match(['get', 'post'], '/exercise3', [Exercise3Controller::class, 'index'])->name('exercise3.index');

// Ejercicio 4: Gestor de Gastos
Route::get('/exercise4', [Exercise4Controller::class, 'index'])->name('exercise4.index');
Route::post('/exercise4/agregar', [Exercise4Controller::class, 'agregar'])->name('exercise4.agregar');
Route::post('/exercise4/eliminar', [Exercise4Controller::class, 'eliminar'])->name('exercise4.eliminar');

// Ejercicio 5: Sistema de Reservas
Route::get('/exercise5', [Exercise5Controller::class, 'index'])->name('exercise5.index');
Route::post('/exercise5/reservar', [Exercise5Controller::class, 'reservar'])->name('exercise5.reservar');
Route::post('/exercise5/cancelar', [Exercise5Controller::class, 'cancelar'])->name('exercise5.cancelar');

// Ejercicio 6: Gestor de Notas
Route::get('/exercise6', [Exercise6Controller::class, 'index'])->name('exercise6.index');
Route::post('/exercise6/crear', [Exercise6Controller::class, 'crear'])->name('exercise6.crear');
Route::post('/exercise6/eliminar', [Exercise6Controller::class, 'eliminar'])->name('exercise6.eliminar');

// Ejercicio 7: Calendario de Eventos
Route::get('/exercise7', [Exercise7Controller::class, 'index'])->name('exercise7.index');
Route::post('/exercise7/agregar', [Exercise7Controller::class, 'agregar'])->name('exercise7.agregar');
Route::post('/exercise7/eliminar', [Exercise7Controller::class, 'eliminar'])->name('exercise7.eliminar');

// Ejercicio 8: Plataforma de Recetas
Route::get('/exercise8', [Exercise8Controller::class, 'index'])->name('exercise8.index');
Route::post('/exercise8/crear', [Exercise8Controller::class, 'crear'])->name('exercise8.crear');
Route::post('/exercise8/eliminar', [Exercise8Controller::class, 'eliminar'])->name('exercise8.eliminar');

// Ejercicio 9: Juego de Memoria
Route::get('/exercise9', [Exercise9Controller::class, 'index'])->name('exercise9.index');
Route::post('/exercise9/iniciar', [Exercise9Controller::class, 'iniciar'])->name('exercise9.iniciar');

// Ejercicio 10: Plataforma de Encuestas
Route::get('/exercise10', [Exercise10Controller::class, 'index'])->name('exercise10.index');
Route::match(['get', 'post'], '/exercise10/crear', [Exercise10Controller::class, 'crear'])->name('exercise10.crear');
Route::match(['get', 'post'], '/exercise10/responder/{id}', [Exercise10Controller::class, 'responder'])->name('exercise10.responder');
Route::get('/exercise10/resultados/{id}', [Exercise10Controller::class, 'resultados'])->name('exercise10.resultados');
Route::post('/exercise10/eliminar', [Exercise10Controller::class, 'eliminar'])->name('exercise10.eliminar');

// Ejercicio 11: Cronómetro Online
Route::get('/exercise11', [Exercise11Controller::class, 'index'])->name('exercise11.index');
