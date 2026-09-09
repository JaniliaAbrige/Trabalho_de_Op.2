<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', UsuarioController::class);



Route::patch(
    'usuarios/{usuario}/ativar',
    [UsuarioController::class, 'ativar']
)->name('usuarios.ativar');

Route::patch(
    'usuarios/{usuario}/desativar',
    [UsuarioController::class, 'desativar']
)->name('usuarios.desativar');