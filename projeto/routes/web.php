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
Route::get('admin/dashboardAdmin','ProjetoController@index')->name("dashboardAdmin")->middleware(['checkLogInAdmin']);
Route::get('admin/projetos/getPorId/{id}', 'ProjetoController@getProjetoPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/projetos/pag', 'ProjetoController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/projetos/getNum', 'ProjetoController@getNumProjetos')->middleware(['checkLogInAdmin']);
Route::post('admin/projetos/delete/{id}', 'ProjetoController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetos/edit/{id}', 'ProjetoController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/projetos/add', 'ProjetoController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/utilizadores', 'UtilizadorController@index')->name("utilizadores")->middleware(['checkLogInAdmin']);
Route::get('admin/utilizadores/getPorId/{id}', 'UtilizadorController@getUserPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/utilizadores/pagUtilizadores', 'UtilizadorController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/utilizadores/getNumUsers', 'UtilizadorController@getNumUsers')->middleware(['checkLogInAdmin']);
Route::post('admin/utilizadores/deleteUtilizador/{id}', 'UtilizadorController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/utilizadores/editUtilizador/{id}', 'UtilizadorController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/utilizadores/addUtilizador', 'UtilizadorController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/professores','ProfessorController@index')->name("professores")->middleware(['checkLogInAdmin']);
Route::get('admin/professores/getPorId/{id}', 'ProfessorController@getProfPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/professores/pag', 'ProfessorController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/professores/getNum', 'ProfessorController@getNumProfs')->middleware(['checkLogInAdmin']);
Route::post('admin/professores/delete/{id}', 'ProfessorController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/professores/edit/{id}', 'ProfessorController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/professores/add', 'ProfessorController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/escolas','EscolaSolidariaController@index')->name("escolas")->middleware(['checkLogInAdmin']);
Route::get('admin/escolas/getPorId/{id}', 'EscolaSolidariaController@getEscolaPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/escolas/pag', 'EscolaSolidariaController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/escolas/getNum', 'EscolaSolidariaController@getNumEscolas')->middleware(['checkLogInAdmin']);
Route::post('admin/escolas/delete/{id}', 'EscolaSolidariaController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/escolas/edit/{id}', 'EscolaSolidariaController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/escolas/add', 'EscolaSolidariaController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/agrupamentos','AgrupamentoController@index')->name("agrupamentos")->middleware(['checkLogInAdmin']);
Route::get('admin/agrupamentos/getAll', 'AgrupamentoController@getAll')->middleware(['checkLogInAdmin']);
Route::get('admin/agrupamentos/getPorId/{id}', 'AgrupamentoController@getAgrupamentoPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/agrupamentos/pag', 'AgrupamentoController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/agrupamentos/getNum', 'AgrupamentoController@getNumAgrupamentos')->middleware(['checkLogInAdmin']);
Route::post('admin/agrupamentos/delete/{id}', 'AgrupamentoController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/agrupamentos/edit/{id}', 'AgrupamentoController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/agrupamentos/add', 'AgrupamentoController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/ilustradores','IlustradorSolidarioController@index')->name("ilustradores")->middleware(['checkLogInAdmin']);
Route::get('admin/ilustradores/getPorId/{id}', 'IlustradorSolidarioController@getIlustradorPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/ilustradores/pag', 'IlustradorSolidarioController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/ilustradores/getNum', 'IlustradorSolidarioController@getNumIlustradores')->middleware(['checkLogInAdmin']);
Route::post('admin/ilustradores/delete/{id}', 'IlustradorSolidarioController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/ilustradores/edit/{id}', 'IlustradorSolidarioController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/ilustradores/add', 'IlustradorSolidarioController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/contadores','ContadorHistoriaController@index')->name("contadores")->middleware(['checkLogInAdmin']);
Route::get('admin/contadores/getPorId/{id}', 'ContadorHistoriaController@getContadorPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/contadores/pag', 'ContadorHistoriaController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/contadores/getNum', 'ContadorHistoriaController@getNumContadores')->middleware(['checkLogInAdmin']);
Route::post('admin/contadores/delete/{id}', 'ContadorHistoriaController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/contadores/edit/{id}', 'ContadorHistoriaController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/contadores/add', 'ContadorHistoriaController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/entidades','EntidadeOficialController@index')->name("entidades")->middleware(['checkLogInAdmin']);
Route::get('admin/entidades/getPorId/{id}', 'EntidadeOficialController@getEntidadePorId')->middleware(['checkLogInAdmin']);
Route::get('admin/entidades/pag', 'EntidadeOficialController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/entidades/getNum', 'EntidadeOficialController@getNumEntidades')->middleware(['checkLogInAdmin']);
Route::post('admin/entidades/delete/{id}', 'EntidadeOficialController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/entidades/edit/{id}', 'EntidadeOficialController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/entidades/add', 'EntidadeOficialController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/juris','JuriController@index')->name("juris")->middleware(['checkLogInAdmin']);
Route::get('admin/juris/getPorId/{id}', 'JuriController@getJuriPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/juris/pag', 'JuriController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/juris/getNum', 'JuriController@getNumJuris')->middleware(['checkLogInAdmin']);
Route::post('admin/juris/delete/{id}', 'JuriController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/juris/edit/{id}', 'JuriController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/juris/add', 'JuriController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/rbes','RBEController@index')->name("rbes")->middleware(['checkLogInAdmin']);
Route::get('admin/rbes/getPorId/{id}', 'RBEController@getRbePorId')->middleware(['checkLogInAdmin']);
Route::get('admin/rbes/pag', 'RBEController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/rbes/getNum', 'RBEController@getNumRbes')->middleware(['checkLogInAdmin']);
Route::post('admin/rbes/delete/{id}', 'RBEController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/rbes/edit/{id}', 'RBEController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/rbes/add', 'RBEController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/universidades','UniversidadeController@index')->name("universidades")->middleware(['checkLogInAdmin']);
Route::get('admin/universidades/getPorId/{id}', 'UniversidadeController@getUniversidadePorId')->middleware(['checkLogInAdmin']);
Route::get('admin/universidades/pag', 'UniversidadeController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/universidades/getNum', 'UniversidadeController@getNumUniversidades')->middleware(['checkLogInAdmin']);
Route::post('admin/universidades/delete/{id}', 'UniversidadeController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/universidades/edit/{id}', 'UniversidadeController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/universidades/add', 'UniversidadeController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/profsFaculdade','ProfessorFaculdadeController@index')->name("profsFaculdade")->middleware(['checkLogInAdmin']);
Route::get('admin/profsFaculdade/getPorId/{id}', 'ProfessorFaculdadeController@getProfPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/profsFaculdade/pag', 'ProfessorFaculdadeController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/profsFaculdade/getNum', 'ProfessorFaculdadeController@getNumProfs')->middleware(['checkLogInAdmin']);
Route::post('admin/profsFaculdade/delete/{id}', 'ProfessorFaculdadeController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/profsFaculdade/edit/{id}', 'ProfessorFaculdadeController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/profsFaculdade/add', 'ProfessorFaculdadeController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/concelhos','ConcelhoController@index')->name("concelhos")->middleware(['checkLogInAdmin']);
Route::get('admin/concelhos/verificaRbe/{id}','ConcelhoController@verificaRbes')->middleware(['checkLogInAdmin']);
Route::get('admin/concelhos/getAll','ConcelhoController@getAll')->middleware(['checkLogInAdmin']);
Route::get('admin/concelhos/getPorId/{id}', 'ConcelhoController@getConcelhoPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/concelhos/pag', 'ConcelhoController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/concelhos/getNum', 'ConcelhoController@getNumConcelhos')->middleware(['checkLogInAdmin']);
Route::post('admin/concelhos/delete/{id}', 'ConcelhoController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/concelhos/edit/{id}', 'ConcelhoController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/concelhos/add', 'ConcelhoController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/trocasAgrupamento', 'TrocaAgrupamentoController@index')->name("trocasAgrupamento")->middleware(['checkLogInAdmin']);
Route::get('admin/trocasAgrupamento/getPorId/{id}', 'TrocaAgrupamentoController@getTrocaPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/trocasAgrupamento/pag', 'TrocaAgrupamentoController@getNextPage')->middleware(['checkLogInAdmin']);
Route::get('admin/trocasAgrupamento/getNum', 'TrocaAgrupamentoController@getNumTrocas')->middleware(['checkLogInAdmin']);
Route::post('admin/trocasAgrupamento/delete/{id}', 'TrocaAgrupamentoController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/trocasAgrupamento/edit/{id}', 'TrocaAgrupamentoController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/trocasAgrupamento/add', 'TrocaAgrupamentoController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/terminarSessao', 'UtilizadorController@realizarLogout')->middleware(['checkLogInAdmin']);
// ROUTES DE LOGIN
Route::post('login', 'UtilizadorController@realizarLogin')->name('login');

// ROUTES PARA O USER COLABORADOR

/*As routes abaixo depois de criar as que estão em cima não vão ser
precisas */
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

Route::resource('uni_prof_faculdade', UniversidadeProfFaculdadeController::class);