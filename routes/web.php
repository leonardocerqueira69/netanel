<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\DiretorController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\PcpController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\CqController;
use App\Http\Controllers\TipoChecklistController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Middleware\EnsureUserIsLoggedIn;


// Rota para exibir o formulário de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rota para processar o formulário de login
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware([EnsureUserIsLoggedIn::class])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/setor/indexSetor', [SetorController::class, 'indexSetor'])->name('indexSetor');

    Route::get('pcp/showPcp/{id}', [PcpController::class, 'getPcpPorSetor'])->name('pcp.showPcp');
    Route::get('/pcp/create', [PcpController::class, 'create'])->name('pcp.create');
    Route::post('/pcp', [PcpController::class, 'store'])->name('pcp.store');
    Route::get('/pcp/edit/{id}', [PcpController::class, 'edit'])->name('pcp.edit');
    Route::put('/pcp/update/{id}', [PcpController::class, 'update'])->name('pcp.update');
    Route::delete('/pcp/{id}', [PcpController::class, 'destroy'])->name('pcp.destroy');

    // Rotas para ChecklistController
    Route::get('/checklists/{nome_tipo}', [ChecklistController::class, 'show'])->name('checklists.show');
    Route::get('/check/create', [ChecklistController::class, 'create'])->name('check.create');
    Route::post('/checklists/uncheck-all', [ChecklistController::class, 'uncheckAll'])->name('checklists.uncheckAll');
    Route::post('/checklists', [ChecklistController::class, 'store'])->name('checklists.store');
    Route::get('/checklists/{id}/edit', [ChecklistController::class, 'edit'])->name('checklists.edit');
    Route::put('/checklists/{id}', [ChecklistController::class, 'update'])->name('checklists.update');
    Route::delete('/checklists/{id}', [ChecklistController::class, 'destroy'])->name('checklists.destroy');
    Route::post('/checklists/update-ajax', [ChecklistController::class, 'updateAjax'])->name('checklists.update.ajax');

    Route::post('/saveTempo', [CronometroController::class, 'store']);

    Route::get('/download-excel', function () {
        return Storage::download('public/CQ.xlsx');
    })->name('download.excel');

    Route::get('/download-cqplana', function () {
        return Storage::download('public/CQPlana.xlsx');
    })->name('download.cqplana');
});






/*
Route::get('/', [DiretorController::class, 'index']);
Route::get('/diretores/{id}', [DiretorController::class, 'show']);
Route::get('/diretores/create', [DiretorController::class, 'create']);
Route::post('/diretores', [DiretorController::class, 'store']);
Route::get('/diretores/{id}/edit', [DiretorController::class, 'edit']);
Route::put('/diretores/{id}', [DiretorController::class, 'update']);
Route::delete('/diretores/{id}', [DiretorController::class, 'destroy']);


/*

// Rotas para SetorController
Route::get('/', [SetorController::class, 'index']);
Route::get('/setores/{id}', [SetorController::class, 'show']);
Route::get('/setores/create', [SetorController::class, 'create']);
Route::post('/setores', [SetorController::class, 'store']);
Route::get('/setores/{id}/edit', [SetorController::class, 'edit']);
Route::put('/setores/{id}', [SetorController::class, 'update']);
Route::delete('/setores/{id}', [SetorController::class, 'destroy']);

// Rotas para TarefaController
Route::get('/', [TarefaController::class, 'index']);
Route::get('/tarefas/{id}', [TarefaController::class, 'show']);
Route::get('/tarefas/create', [TarefaController::class, 'create']);
Route::post('/tarefas', [TarefaController::class, 'store']);
Route::get('/tarefas/{id}/edit', [TarefaController::class, 'edit']);
Route::put('/tarefas/{id}', [TarefaController::class, 'update']);
Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy']);

// Rotas para PcpController
Route::get('/', [PcpController::class, 'index']);
Route::get('/pcps/{id}', [PcpController::class, 'show']);
Route::get('/pcps/create', [PcpController::class, 'create']);
Route::post('/pcps', [PcpController::class, 'store']);
Route::get('/pcps/{id}/edit', [PcpController::class, 'edit']);
Route::put('/pcps/{id}', [PcpController::class, 'update']);
Route::delete('/pcps/{id}', [PcpController::class, 'destroy']);

// Rotas para ListaController
Route::get('/', [ListaController::class, 'index']);
Route::get('/listas/{id}', [ListaController::class, 'show']);
Route::get('/listas/create', [ListaController::class, 'create']);
Route::post('/listas', [ListaController::class, 'store']);
Route::get('/listas/{id}/edit', [ListaController::class, 'edit']);
Route::put('/listas/{id}', [ListaController::class, 'update']);
Route::delete('/listas/{id}', [ListaController::class, 'destroy']);



// Rotas para CqController
Route::get('/', [CqController::class, 'index']);
Route::get('/cqs/{id}', [CqController::class, 'show']);
Route::get('/cqs/create', [CqController::class, 'create']);
Route::post('/cqs', [CqController::class, 'store']);
Route::get('/cqs/{id}/edit', [CqController::class, 'edit']);
Route::put('/cqs/{id}', [CqController::class, 'update']);
Route::delete('/cqs/{id}', [CqController::class, 'destroy']);

// Rotas para TipoChecklistController
Route::get('/', [TipoChecklistController::class, 'index']);
Route::get('/tipos-checklist/{id}', [TipoChecklistController::class, 'show']);
Route::get('/tipos-checklist/create', [TipoChecklistController::class, 'create']);
Route::post('/tipos-checklist', [TipoChecklistController::class, 'store']);
Route::get('/tipos-checklist/{id}/edit', [TipoChecklistController::class, 'edit']);
Route::put('/tipos-checklist/{id}', [TipoChecklistController::class, 'update']);
Route::delete('/tipos-checklist/{id}', [TipoChecklistController::class, 'destroy']);


Route::get('/', [ColaboradorController::class, 'index']);
Route::get('/colaboradores/{id}', [ColaboradorController::class, 'show']);
Route::get('/colaboradores/create', [ColaboradorController::class, 'create']);
Route::post('/colaboradores', [ColaboradorController::class, 'store']);
Route::get('/colaboradores/{id}/edit', [ColaboradorController::class, 'edit']);
Route::put('/colaboradores/{id}', [ColaboradorController::class, 'update']);
Route::delete('/colaboradores/{id}', [ColaboradorController::class, 'destroy']);




*/
