<?php
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PacoteController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//rotas para aluno - codigo do professor
Route::post('aluno/search', [AlunoController::class, 'search'])->name('aluno.search');
Route::resource('aluno', AlunoController::class);

//rotas para cliente
Route::post('cliente/search', [ClienteController::class, 'search'])->name('cliente.search');
Route::resource('cliente', ClienteController::class);
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');

//rotas para pacote
Route::post('pacote/search', [PacoteController::class, 'search'])->name('pacote.search');
Route::resource('pacotes', PacoteController::class);

//rotas específicas para pacotes
Route::get('/pacotes', [PacoteController::class, 'index'])->name('pacotes.index');
Route::get('/pacotes/create', [PacoteController::class, 'create'])->name('pacotes.create'); 
Route::post('/pacotes', [PacoteController::class, 'store'])->name('pacotes.store'); 
Route::get('/pacotes/{id}/edit', [PacoteController::class, 'edit'])->name('pacotes.edit'); 
Route::put('/pacotes/{id}', [PacoteController::class, 'update']); 
Route::delete('/pacotes/{id}', [PacoteController::class, 'destroy']); 
Route::get('/pacotes/{id}', [PacoteController::class, 'show']);
Route::get('/pacotes/search', [PacoteController::class, 'search'])->name('pacotes.search');

//rotas para reserva
Route::resource('reservas', ReservaController::class);