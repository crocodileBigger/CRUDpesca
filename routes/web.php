<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeixeController;
use App\Http\Controllers\PescadorController;
use App\Models\Pescador;

Route::get('/', function () {
    return view('welcome');
});


//rotas do peixe/get
Route::get('/todosPeixes', [PeixeController::class, 'todosPeixes']);
Route::get('/lugares/{lugar}', [PeixeController::class, 'lugaresOndeTemPeixe']);
Route::get('/todosLugares', [PeixeController::class, 'lugares']);

//rotas do peixe/get
Route::post('/peixeAdicionar', [PescadorController::class, 'adicionarPeixe']);

//rotas do pescador/get
Route::get('/pescadorPeixes/{id}', [PescadorController::class, 'pescadorPeixes']);
Route::get('/pescador/{id}', [PescadorController::class, 'idDoPescador']);
Route::get('/pescadorHistoria/{num}', [PescadorController::class, 'pescadorAtivoOuDesativado']);


//rotas do pescador/get
Route::post('/pescadorAdicionar', [PescadorController::class, 'adicionarPescador']);
