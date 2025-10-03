<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeixeController;
use App\Http\Controllers\PescadorController;

Route::get('/', function () {
    return view('welcome');
});


//rotas do peixe
Route::get('/todosPeixes', [PeixeController::class, 'todosPeixes']);
Route::get('/lugares/{lugar}', [PeixeController::class, 'lugaresOndeTemPeixe']);
Route::get('/todosLugares', [PeixeController::class, 'lugares']);
Route::get('/pescadorPeixes/{id}', [PeixeController::class, 'pescadorPeixes']);


//rotas do pescador
