<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DiretorController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\PcpController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\CqController;
use App\Http\Controllers\TipoChecklistController;
use App\Http\Controllers\ColaboradorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcp', function () {
    return view('pcp');
});

Route::get('/checklist', function () {
    return view('checklist');
});

Route::get('/database', function () {
    return view('database');
});

Route::resource('diretores', DiretorController::class);
Route::resource('setores', SetorController::class);
Route::resource('tarefas', TarefaController::class);
Route::resource('pcps', PcpController::class);
Route::resource('listas', ListaController::class);
Route::resource('tarefas', ChecklistController::class);
Route::resource('cqs', CqController::class);
Route::resource('tipos-checklist', TipoChecklistController::class);
Route::resource('colaboradores', ColaboradorController::class);




