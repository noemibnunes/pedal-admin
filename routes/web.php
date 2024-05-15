<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\PontoController;
use App\Http\Controllers\UserAdmController;
use App\Http\Controllers\BicicletaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserAdmController::class, 'loginView'])->name('login');

Route::get('/cadastro', [UserAdmController::class, 'index'])->name('cadastro');
Route::get('/logout', [UserAdmController::class, 'logout'])->name('logout');
Route::get('/bicicletas', [BicicletaController::class, 'all'])->name('bicicletas');
Route::get('/planos', [PlanoController::class, 'all'])->name('planos');
Route::get('/visualizar-bicicleta/{id}', [BicicletaController::class, 'getBicicleta'])->name('bicicleta');

Route::post('/cadastro-adm', [UserAdmController::class, 'cadastro'])->name('cadastro-adm');
Route::post('/login-adm', [UserAdmController::class, 'login'])->name('login-adm');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/painel-adm', [UserAdmController::class, 'painelAdm'])->name('painel-adm');
    ####### BICICLETA #######
    Route::get('/bicicleta-view', [BicicletaController::class, 'index'])->name('bicicleta-view');
    Route::get('/cadastro-view', [BicicletaController::class, 'cadastroView'])->name('cadastro-view');
    Route::post('/cadastro-bicicleta', [BicicletaController::class, 'cadastroBicicleta'])->name('cadastro-bicicleta');
    Route::get('/bicicleta/{id}', [BicicletaController::class, 'show'])->name('show');
    Route::get('/edit-view/{id}', [BicicletaController::class, 'editView'])->name('edit-view');
    Route::put('/edit-bicicleta/{id}', [BicicletaController::class, 'editarBicicleta'])->name('edit-bicicleta');
    Route::delete('/delete-bicicleta/{id}', [BicicletaController::class, 'deleteBicicleta'])->name('delete-bicicleta');

    ####### PLANO #######
    Route::get('/plano-view', [PlanoController::class, 'index'])->name('plano-view');
    Route::get('/cadastro-plano-view', [PlanoController::class, 'cadastroView'])->name('cadastro-plano-view');
    Route::post('/cadastro-plano', [PlanoController::class, 'cadastroPlano'])->name('cadastro-plano');
    Route::get('/plano/{id}', [PlanoController::class, 'show'])->name('show-plano');
    Route::get('/edit-plano-view/{id}', [PlanoController::class, 'editView'])->name('edit-plano-view');
    Route::put('/edit-plano/{id}', [PlanoController::class, 'editarPlano'])->name('edit-plano');
    Route::delete('/delete-plano/{id}', [PlanoController::class, 'deletePlano'])->name('delete-plano');

    ####### PONTO #######
    Route::get('/ponto-view', [PontoController::class, 'index'])->name('ponto-view');
    Route::get('/cadastro-ponto-view', [PontoController::class, 'cadastroView'])->name('cadastro-ponto-view');
    Route::post('/cadastro-ponto', [PontoController::class, 'cadastroPonto'])->name('cadastro-ponto');
    Route::get('/ponto/{id}', [PontoController::class, 'show'])->name('show-ponto');
    Route::get('/edit-ponto-view/{id}', [PontoController::class, 'editView'])->name('edit-ponto-view');
    Route::put('/edit-ponto/{id}', [PontoController::class, 'editarPonto'])->name('edit-ponto');
    Route::delete('/delete-ponto/{id}', [PontoController::class, 'deletePonto'])->name('delete-ponto');

});

