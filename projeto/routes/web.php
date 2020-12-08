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
})->name("paginaLogin");

Route::get('/{msg}', function ($msg) {
    return view("login")->with("msg", $msg);
})->name("paginaLoginErro");

//ROUTES PARA O USER ADMIN
/*Cada route tem de ter um middleware que verifica se o utilizador fez login antes de concretizar o pedido*/
Route::get('admin/dashboardAdmin','ProjetoController@index')->name("dashboardAdmin")->middleware(['checkLogIn']);
Route::get('admin/projetos/getPorId/{id}', 'ProjetoController@getProjetoPorId')->middleware(['checkLogIn']);

Route::get('admin/utilizadores', 'UtilizadorController@index')->name("utilizadores")->middleware(['checkLogIn']);
Route::get('admin/utilizadores/getPorId/{id}', 'UtilizadorController@getUserPorId')->middleware(['checkLogIn']);
Route::post('admin/utilizadores/deleteUtilizador/{id}', 'UtilizadorController@destroy')->middleware(['checkLogIn']);
Route::post('admin/utilizadores/editUtilizador/{id}', 'UtilizadorController@update')->middleware(['checkLogIn']);
Route::post('admin/utilizadores/addUtilizador', 'UtilizadorController@store')->middleware(['checkLogIn']);

Route::get('admin/terminarSessao', 'UtilizadorController@realizarLogout')->middleware(['checkLogIn']);
// ROUTES DE LOGIN
Route::post('login', 'UtilizadorController@realizarLogin')->name('login');

// ROUTES PARA O USER COLABORADOR

Route::resource('projetos', ProjetoController::class);

Route::resource('agrupamentos', AgrupamentoController::class);

Route::resource('cargos', CargoProfController::class);

Route::resource('cod_postal', CodPostalController::class);

Route::resource('cod_postal_rua', CodPostalRuaController::class);

Route::resource('concelhos', ConcelhoController::class);

Route::resource('contador_historias', ContadorHistoriaController::class);

Route::resource('entidade_oficial', EntidadeOficialController::class);

Route::resource('escola_solidaria', EscolaSolidariaController::class);

Route::resource('formacao', FormacaoController::class);

Route::resource('ilustrador_solidario', IlustradorSolidarioController::class);

Route::resource('juri', JuriController::class);

Route::resource('professor', ProfessorController::class);

Route::resource('professor_faculdade', ProfessorFaculdadeController::class);

Route::resource('rbe', RBEController::class);

Route::resource('universidade', UniversidadeController::class);

Route::resource('troca_agrupamento', TrocaAgrupamentoController::class);