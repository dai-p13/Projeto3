<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("login");
});

Route::post('login', 'UtilizadorController@realizarLogin');
Route::get('login', 'UtilizadorController@notAllowed');

Route::resource('utilizadores', UtilizadorController::class);

Route::resource('projetos', ProjetoController::class);

Route::resource('agrupamentos', AgrupamentoController::class);

Route::resource('cargos', CargoProfController::class);

Route::resource('cod_postal', CodPostalController::class);

Route::resource('cod_postal_rua', CodPostalRuaController::class);

Route::resource('concelhos', ConcelhoController::class);

Route::resource('contador_historias', ContadorHistoriaController::class);

Route::resource('entidade_oficial', EntidadeOficialController::class);


