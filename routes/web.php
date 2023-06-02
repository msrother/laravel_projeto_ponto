<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre', function () {
    return view('base.sobre');
})->name('sobre');

Route::get('/noticias', function () {
    return view('base.noticias');
})->name('noticias');

Route::get('/users', function () {
    return view('base.users');
})->name('users');

Route::get('/funcionarios', function () {
    return view('base.funcionarios');
})->name('funcionarios');

Route::get('/cidades', function () {
    return view('base.cidades');
})->name('cidades');

Route::get('/cargos', function () {
    return view('base.cargos');
})->name('cargos');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
    Rota utiliza o método GET para obter uma lista de colaboradores. 
    A rota é mapeada para o método index() do controlador ColaboradoresController.
    Quando um usuário acessa a URL correspondente a esta rota no navegador, o Laravel chama o método index() do controlador ColaboradoresController e retorna a view correspondente.
    A view(colaboradores) é uma página que exibe a lista de colaboradores, e é renderizada pelo Laravel usando as informações fornecidas pelo método index() do controlador.
    Essa rota pode ser modificada de acordo com as necessidades, incluindo alterações no método HTTP utilizado, na URL e no controlador associado.
*/


//users administrativos
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index']);

Route::post('/users/{id}',[App\Http\Controllers\UsersController::class, 'criar_user'])->name('criar_user');

Route::put('/users/{id}',[App\Http\Controllers\UsersController::class, 'atualizar_user'])->name('atualizar_user');

Route::delete('/users/{id}',[App\Http\Controllers\UsersController::class, 'deletar_user'])->name('deletar_user');


//funcionários
Route::get('/funcionarios', [App\Http\Controllers\FuncionariosController::class, 'index']);

Route::post('/funcionarios/{id}',[App\Http\Controllers\FuncionariosController::class, 'criar_funcionario'])->name('criar_funcionario');

Route::put('/funcionarios/{id}',[App\Http\Controllers\FuncionariosController::class, 'atualizar_funcionario'])->name('atualizar_funcionario');

Route::delete('/funcionarios/{id}',[App\Http\Controllers\FuncionariosController::class, 'deletar_funcionario'])->name('deletar_funcionario');


//cidades
Route::get('/cidades', [App\Http\Controllers\CidadesController::class, 'index']);

Route::post('/cidades/{id}',[App\Http\Controllers\CidadesController::class, 'criar_cidade'])->name('criar_cidade');

Route::put('/cidades/{id}',[App\Http\Controllers\CidadesController::class, 'atualizar_cidade'])->name('atualizar_cidade');

Route::delete('/cidades/{id}',[App\Http\Controllers\CidadesController::class, 'deletar_cidade'])->name('deletar_cidade');




//cargos
Route::get('/cargos', [App\Http\Controllers\CargosController::class, 'index']);

Route::post('/cargos/{id}',[App\Http\Controllers\CargosController::class, 'criar_cargo'])->name('criar_cargo');

Route::put('/cargos/{id}',[App\Http\Controllers\CargosController::class, 'atualizar_cargo'])->name('atualizar_cargo');

Route::delete('/cargos/{id}',[App\Http\Controllers\CargosController::class, 'deletar_cargo'])->name('deletar_cargo');




//pontos

