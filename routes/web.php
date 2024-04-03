<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\UserAdmController;
use App\Http\Controllers\BicicletaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', [UserAdmController::class, 'index'])->name('cadastro');
Route::get('/login', [UserAdmController::class, 'loginView'])->name('login');
Route::get('/logout', [UserAdmController::class, 'logout'])->name('logout');

Route::post('/cadastro-adm', [UserAdmController::class, 'cadastro'])->name('cadastro-adm');
Route::post('/login-adm', [UserAdmController::class, 'login'])->name('login-adm');

Route::middleware(['auth'])->group(function () {
    Route::get('/painel-adm', [UserAdmController::class, 'painelAdm'])->name('painel-adm');
    ####### BICICLETA #######
    Route::get('/bicicleta-view', [BicicletaController::class, 'index'])->name('bicicleta-view');
    Route::get('/cadastro-view', [BicicletaController::class, 'cadastroView'])->name('cadastro-view');
    Route::get('/bicicleta/{id}', [BicicletaController::class, 'show'])->name('show');
    Route::post('/cadastro-bicicleta', [BicicletaController::class, 'cadastroBicicleta'])->name('cadastro-bicicleta');
    Route::get('/edit-view/{id}', [BicicletaController::class, 'editView'])->name('edit-view');
    Route::put('/edit-bicicleta/{id}', [BicicletaController::class, 'editarBicicleta'])->name('edit-bicicleta');
    Route::delete('/delete-bicicleta/{id}', [BicicletaController::class, 'deleteBicicleta'])->name('delete-bicicleta');
});

