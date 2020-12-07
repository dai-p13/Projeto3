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

//ROUTES PARA O USER ADMIN
Route::get('admin/dashboardAdmin', 'ProjetoController@index')->name("dashboardAdmin");
Route::get('admin/projetos/getPorId/{id}', 'ProjetoController@getProjetoPorId');
Route::get('admin/terminarSessao', 'UtilizadorController@realizarLogout');

// ROUTES DE LOGIN
Route::post('login', 'UtilizadorController@realizarLogin');
Route::get('login', 'UtilizadorController@notAllowed');

// ROUTES PARA O USER COLABORADOR
Route::resource('utilizadores', UtilizadorController::class);

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

Route::resource('projeto_contador', ProjetoContadorController::class);

Route::resource('projeto_entidade', ProjetoEntidadeController::class);

Route::resource('projeto_escola', ProjetoEscolaController::class);

Route::resource('projeto_ilustrador', ProjetoIlustradorController::class);

Route::resource('projeto_juri', ProjetoJuriController::class);

Route::resource('projeto_professor', ProjetoProfessorController::class);

Route::resource('projeto_professor_facul', ProjetoProfessorFaculController::class);

Route::resource('projeto_rbe', ProjetoRBEController::class);

Route::resource('projeto_universidade', ProjetoUniversidadeController::class);

Route::resource('projeto_utilizador', ProjetoUtilizadorController::class);