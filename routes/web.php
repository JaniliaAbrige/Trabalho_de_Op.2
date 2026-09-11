<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\DisciplinaController;


/*
|--------------------------------------------------------------------------
| Página inicial
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');


/*
|--------------------------------------------------------------------------
| Utilizadores
|--------------------------------------------------------------------------
*/

Route::resource('usuarios', UsuarioController::class);

Route::patch(
    'usuarios/{usuario}/ativar',
    [UsuarioController::class, 'ativar']
)->name('usuarios.ativar');

Route::patch(
    'usuarios/{usuario}/desativar',
    [UsuarioController::class, 'desativar']
)->name('usuarios.desativar');


/*
|--------------------------------------------------------------------------
| Autenticação
|--------------------------------------------------------------------------
*/

Route::get(
    '/login',
    [LoginController::class, 'showLoginForm']
)->name('login');

Route::post(
    '/login',
    [LoginController::class, 'login']
)->name('login.submit');

Route::post(
    '/logout',
    [LoginController::class, 'logout']
)->name('logout');


/*
|--------------------------------------------------------------------------
| Cursos
|--------------------------------------------------------------------------
*/

Route::get(
    '/cursos',
    [CursoController::class, 'index']
)->name('cursos.index');

Route::get(
    '/cursos/criar',
    [CursoController::class, 'create']
)->name('cursos.create');

Route::post(
    '/cursos',
    [CursoController::class, 'store']
)->name('cursos.store');

Route::get(
    '/cursos/{curso}',
    [CursoController::class, 'show']
)->name('cursos.show');

Route::get(
    '/cursos/{curso}/editar',
    [CursoController::class, 'edit']
)->name('cursos.edit');

Route::put(
    '/cursos/{curso}',
    [CursoController::class, 'update']
)->name('cursos.update');

Route::delete(
    '/cursos/{curso}',
    [CursoController::class, 'destroy']
)->name('cursos.destroy');

Route::patch(
    '/cursos/{curso}/ativar',
    [CursoController::class, 'ativar']
)->name('cursos.ativar');

Route::patch(
    '/cursos/{curso}/desativar',
    [CursoController::class, 'desativar']
)->name('cursos.desativar');


/*
|--------------------------------------------------------------------------
| Categorias
|--------------------------------------------------------------------------
*/

Route::get(
    '/categorias',
    [CategoriaController::class, 'index']
)->name('categorias.index');

Route::get(
    '/categorias/criar',
    [CategoriaController::class, 'create']
)->name('categorias.create');

Route::post(
    '/categorias',
    [CategoriaController::class, 'store']
)->name('categorias.store');

Route::get(
    '/categorias/{categoria}',
    [CategoriaController::class, 'show']
)->name('categorias.show');

Route::get(
    '/categorias/{categoria}/editar',
    [CategoriaController::class, 'edit']
)->name('categorias.edit');

Route::put(
    '/categorias/{categoria}',
    [CategoriaController::class, 'update']
)->name('categorias.update');

Route::delete(
    '/categorias/{categoria}',
    [CategoriaController::class, 'destroy']
)->name('categorias.destroy');

Route::patch(
    '/categorias/{categoria}/ativar',
    [CategoriaController::class, 'ativar']
)->name('categorias.ativar');

Route::patch(
    '/categorias/{categoria}/desativar',
    [CategoriaController::class, 'desativar']
)->name('categorias.desativar');


/*
|--------------------------------------------------------------------------
| Estudantes
|--------------------------------------------------------------------------
*/

Route::get(
    '/estudantes',
    [EstudanteController::class, 'index']
)->name('estudantes.index');

Route::get(
    '/estudantes/criar',
    [EstudanteController::class, 'create']
)->name('estudantes.create');

Route::post(
    '/estudantes',
    [EstudanteController::class, 'store']
)->name('estudantes.store');

Route::get(
    '/estudantes/{estudante}',
    [EstudanteController::class, 'show']
)->name('estudantes.show');

Route::get(
    '/estudantes/{estudante}/editar',
    [EstudanteController::class, 'edit']
)->name('estudantes.edit');

Route::put(
    '/estudantes/{estudante}',
    [EstudanteController::class, 'update']
)->name('estudantes.update');

Route::delete(
    '/estudantes/{estudante}',
    [EstudanteController::class, 'destroy']
)->name('estudantes.destroy');


/*
|--------------------------------------------------------------------------
| Inscrições
|--------------------------------------------------------------------------
*/

Route::get(
    '/inscricoes',
    [InscricaoController::class, 'index']
)->name('inscricoes.index');

Route::get(
    '/inscricoes/criar',
    [InscricaoController::class, 'create']
)->name('inscricoes.create');

Route::post(
    '/inscricoes',
    [InscricaoController::class, 'store']
)->name('inscricoes.store');

Route::get(
    '/inscricoes/{inscricao}',
    [InscricaoController::class, 'show']
)->name('inscricoes.show');

Route::get(
    '/inscricoes/{inscricao}/editar',
    [InscricaoController::class, 'edit']
)->name('inscricoes.edit');

Route::put(
    '/inscricoes/{inscricao}',
    [InscricaoController::class, 'update']
)->name('inscricoes.update');

Route::delete(
    '/inscricoes/{inscricao}',
    [InscricaoController::class, 'destroy']
)->name('inscricoes.destroy');


/*
|--------------------------------------------------------------------------
| Disciplinas
|--------------------------------------------------------------------------
*/

Route::get(
    '/disciplinas',
    [DisciplinaController::class, 'index']
)->name('disciplinas.index');

Route::get(
    '/disciplinas/criar',
    [DisciplinaController::class, 'create']
)->name('disciplinas.create');

Route::post(
    '/disciplinas',
    [DisciplinaController::class, 'store']
)->name('disciplinas.store');

Route::get(
    '/disciplinas/{disciplina}',
    [DisciplinaController::class, 'show']
)->name('disciplinas.show');

Route::get(
    '/disciplinas/{disciplina}/editar',
    [DisciplinaController::class, 'edit']
)->name('disciplinas.edit');

Route::put(
    '/disciplinas/{disciplina}',
    [DisciplinaController::class, 'update']
)->name('disciplinas.update');

Route::delete(
    '/disciplinas/{disciplina}',
    [DisciplinaController::class, 'destroy']
)->name('disciplinas.destroy');

Route::patch(
    '/disciplinas/{disciplina}/ativar',
    [DisciplinaController::class, 'ativar']
)->name('disciplinas.ativar');

Route::patch(
    '/disciplinas/{disciplina}/desativar',
    [DisciplinaController::class, 'desativar']
)->name('disciplinas.desativar');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/docente/dashboard', function () {
    return view('docente.dashboard');
})->name('docente.dashboard');

Route::get('/estudante/dashboard', function () {
    return view('estudantes.dashboard');
})->name('estudante.dashboard');