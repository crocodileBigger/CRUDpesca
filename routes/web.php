<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeixeController;
use App\Http\Controllers\PescadorController;

Route::get('/', function () {
    return view('welcome');
});


//rotas do peixe/get
Route::get('/todosPeixes', [PeixeController::class, 'todosPeixes']);
Route::get('/lugares/{lugar}', [PeixeController::class, 'lugaresOndeTemPeixe']);
Route::get('/todosLugares', [PeixeController::class, 'lugares']);
//rotas de adicionar um peixe
Route::post('/peixeAdicionar', [PeixeController::class, 'adicionarPeixe']);
//deletar peixe
Route::delete('/deletarPorIdPeixe/{id}', [PeixeController::class, 'peixeDeletarPorId']);
//atualizar peixe
Route::put('/peixe/{id}', [PeixeController::class, 'atualizarPeixe']);


//rotas do pescador/get
Route::get('/pescadorPeixes/{id}', [PescadorController::class, 'pescadorPeixes']);
Route::get('/pescador/{id}', [PescadorController::class, 'idDoPescador']);
Route::get('/pescadorHistoria/{num}', [PescadorController::class, 'pescadorAtivoOuDesativado']);
//rotas de adicionar um pescador
Route::post('/pescadorAdicionar', [PescadorController::class, 'adicionarPescador']);
//deletar pescador
Route::delete('/deletarPorIdPescador/{id}', [PescadorController::class, 'pescadorDeletarPorId']);
//atualizar pescador
Route::put('/pescador/{id}', [PescadorController::class, 'atualizarPescador']);
