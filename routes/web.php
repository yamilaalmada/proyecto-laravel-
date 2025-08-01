<?php

use Illuminate\Support\Facades\Route;

Route::view('/aireacondicionado', 'aireacondicionado');
Route::view('/cortina', 'cortina');
Route::view('/docente', 'docente');
Route::view('/foco', 'foco');
Route::view('/historialfoco', 'historialfoco');
Route::view('/historialusoaireacondicionado', 'historialusoaireacondicionado');
Route::view('/horario', 'horario');
Route::view('/materia', 'materia');
Route::view('/mueble', 'mueble');
Route::view('/reserva', 'reserva');

Route::get('/', function () {
    return view('welcome');
});
