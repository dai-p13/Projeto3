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
Route::post('admin/projetos/delete/{id}', 'ProjetoController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetos/edit/{id}', 'ProjetoController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/projetos/add', 'ProjetoController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/gerirProjeto{id}', 'ProjetoController@gerirParticipantes')->name("gerirProjeto")->middleware(['checkLogInAdmin']);
Route::get('admin/gerirProjeto/getParticipantes', 'ProjetoController@getParticipantes')->middleware(['checkLogInAdmin']);
Route::get('admin/gerirProjeto/pesquisaParticipantes/{tipo}-{ano}-{pesq}', 'ProjetoController@participantesPesq')->middleware(['checkLogInAdmin']);

Route::get('admin/utilizadores', 'UtilizadorController@index')->name("utilizadores")->middleware(['checkLogInAdmin']);
Route::get('admin/utilizadores/getPorId/{id}', 'UtilizadorController@getUserPorId')->middleware(['checkLogInAdmin']);
Route::post('admin/utilizadores/deleteUtilizador/{id}', 'UtilizadorController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/utilizadores/editUtilizador/{id}', 'UtilizadorController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/utilizadores/addUtilizador', 'UtilizadorController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/professores','ProfessorController@index')->name("professores")->middleware(['checkLogInAdmin']);
Route::get('admin/professores/getPorId/{id}', 'ProfessorController@getProfPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/professores/getDisponiveis', 'ProfessorController@getDisponiveis')->middleware(['checkLogInAdmin']);
Route::post('admin/professores/delete/{id}', 'ProfessorController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/professores/edit/{id}', 'ProfessorController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/professores/add', 'ProfessorController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/escolas','EscolaSolidariaController@index')->name("escolas")->middleware(['checkLogInAdmin']);
Route::get('admin/escolas/getPorId/{id}', 'EscolaSolidariaController@getEscolaPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/escolas/getDisponiveis', 'EscolaSolidariaController@getDisponiveis')->middleware(['checkLogInAdmin']);
Route::post('admin/escolas/delete/{id}', 'EscolaSolidariaController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/escolas/edit/{id}', 'EscolaSolidariaController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/escolas/add', 'EscolaSolidariaController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/agrupamentos','AgrupamentoController@index')->name("agrupamentos")->middleware(['checkLogInAdmin']);
Route::get('admin/agrupamentos/getAll', 'AgrupamentoController@getAll')->middleware(['checkLogInAdmin']);
Route::get('admin/agrupamentos/getPorId/{id}', 'AgrupamentoController@getAgrupamentoPorId')->middleware(['checkLogInAdmin']);
Route::post('admin/agrupamentos/delete/{id}', 'AgrupamentoController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/agrupamentos/edit/{id}', 'AgrupamentoController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/agrupamentos/add', 'AgrupamentoController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/ilustradores','IlustradorSolidarioController@index')->name("ilustradores")->middleware(['checkLogInAdmin']);
Route::get('admin/ilustradores/getPorId/{id}', 'IlustradorSolidarioController@getIlustradorPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/ilustradores/getDisponiveis', 'IlustradorSolidarioController@getDisponiveis')->middleware(['checkLogInAdmin']);
Route::post('admin/ilustradores/delete/{id}', 'IlustradorSolidarioController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/ilustradores/edit/{id}', 'IlustradorSolidarioController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/ilustradores/add', 'IlustradorSolidarioController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/contadores','ContadorHistoriaController@index')->name("contadores")->middleware(['checkLogInAdmin']);
Route::get('admin/contadores/getPorId/{id}', 'ContadorHistoriaController@getContadorPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/contadores/getDisponiveis', 'ContadorHistoriaController@getDisponiveis')->middleware(['checkLogInAdmin']);
Route::post('admin/contadores/delete/{id}', 'ContadorHistoriaController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/contadores/edit/{id}', 'ContadorHistoriaController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/contadores/add', 'ContadorHistoriaController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/entidades','EntidadeOficialController@index')->name("entidades")->middleware(['checkLogInAdmin']);
Route::get('admin/entidades/getPorId/{id}', 'EntidadeOficialController@getEntidadePorId')->middleware(['checkLogInAdmin']);
Route::get('admin/entidades/getDisponiveis', 'EntidadeOficialController@getDisponiveis')->middleware(['checkLogInAdmin']);
Route::post('admin/entidades/delete/{id}', 'EntidadeOficialController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/entidades/edit/{id}', 'EntidadeOficialController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/entidades/add', 'EntidadeOficialController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/juris','JuriController@index')->name("juris")->middleware(['checkLogInAdmin']);
Route::get('admin/juris/getPorId/{id}', 'JuriController@getJuriPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/juris/getDisponiveis', 'JuriController@getDisponiveis')->middleware(['checkLogInAdmin']);
Route::post('admin/juris/delete/{id}', 'JuriController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/juris/edit/{id}', 'JuriController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/juris/add', 'JuriController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/rbes','RBEController@index')->name("rbes")->middleware(['checkLogInAdmin']);
Route::get('admin/rbes/getPorId/{id}', 'RBEController@getRbePorId')->middleware(['checkLogInAdmin']);
Route::get('admin/rbes/getDisponiveis', 'RBEController@getDisponiveis')->middleware(['checkLogInAdmin']);
Route::post('admin/rbes/delete/{id}', 'RBEController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/rbes/edit/{id}', 'RBEController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/rbes/add', 'RBEController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/universidades','UniversidadeController@index')->name("universidades")->middleware(['checkLogInAdmin']);
Route::get('admin/universidades/getPorId/{id}', 'UniversidadeController@getUniversidadePorId')->middleware(['checkLogInAdmin']);
Route::get('admin/universidades/getDisponiveis', 'UniversidadeController@getDisponiveis')->middleware(['checkLogInAdmin']);
Route::post('admin/universidades/delete/{id}', 'UniversidadeController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/universidades/edit/{id}', 'UniversidadeController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/universidades/add', 'UniversidadeController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/profsFaculdade','ProfessorFaculdadeController@index')->name("profsFaculdade")->middleware(['checkLogInAdmin']);
Route::get('admin/profsFaculdade/getPorId/{id}', 'ProfessorFaculdadeController@getProfPorId')->middleware(['checkLogInAdmin']);
Route::get('admin/profsFaculdade/getDisponiveis', 'ProfessorFaculdadeController@getDisponiveis')->middleware(['checkLogInAdmin']);
Route::post('admin/profsFaculdade/delete/{id}', 'ProfessorFaculdadeController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/profsFaculdade/edit/{id}', 'ProfessorFaculdadeController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/profsFaculdade/add', 'ProfessorFaculdadeController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/concelhos','ConcelhoController@index')->name("concelhos")->middleware(['checkLogInAdmin']);
Route::get('admin/concelhos/verificaRbe/{id}','ConcelhoController@verificaRbes')->middleware(['checkLogInAdmin']);
Route::get('admin/concelhos/getAll','ConcelhoController@getAll')->middleware(['checkLogInAdmin']);
Route::get('admin/concelhos/getPorId/{id}', 'ConcelhoController@getConcelhoPorId')->middleware(['checkLogInAdmin']);
Route::post('admin/concelhos/delete/{id}', 'ConcelhoController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/concelhos/edit/{id}', 'ConcelhoController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/concelhos/add', 'ConcelhoController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/trocasAgrupamento', 'TrocaAgrupamentoController@index')->name("trocasAgrupamento")->middleware(['checkLogInAdmin']);
Route::get('admin/trocasAgrupamento/getPorId/{id}', 'TrocaAgrupamentoController@getTrocaPorId')->middleware(['checkLogInAdmin']);
Route::post('admin/trocasAgrupamento/delete/{id}', 'TrocaAgrupamentoController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/trocasAgrupamento/edit/{id}', 'TrocaAgrupamentoController@update')->middleware(['checkLogInAdmin']);
Route::post('admin/trocasAgrupamento/add', 'TrocaAgrupamentoController@store')->middleware(['checkLogInAdmin']);

Route::get('admin/codPostal/getAll', 'CodPostalController@getAll')->middleware(['checkLogInAdmin']);
Route::get('admin/codPostal/add', 'CodPostalController@store')->middleware(['checkLogInAdmin']);

//ROUTES DE VERIFICAÇÃO DA EXISTÊNCIA DE ASSOCIAÇÕES AOS PROJETOS

Route::get('admin/projetoEscola/jaAssociado/{id}-{id_projeto}-{ano}', 'ProjetoEscolaController@verificaAssociacao')->middleware(['checkLogInAdmin']);
Route::get('admin/projetoIlustrador/jaAssociado/{id}-{id_projeto}-{ano}', 'ProjetoIlustradorController@verificaAssociacao')->middleware(['checkLogInAdmin']);
Route::get('admin/projetoContador/jaAssociado/{id}-{id_projeto}-{ano}', 'ProjetoContadorController@verificaAssociacao')->middleware(['checkLogInAdmin']);
Route::get('admin/projetoEntidade/jaAssociado/{id}-{id_projeto}-{ano}', 'ProjetoEntidadeController@verificaAssociacao')->middleware(['checkLogInAdmin']);
Route::get('admin/projetoJuri/jaAssociado/{id}-{id_projeto}-{ano}', 'ProjetoJuriController@verificaAssociacao')->middleware(['checkLogInAdmin']);
Route::get('admin/projetoRbe/jaAssociado/{id}-{id_projeto}-{ano}', 'ProjetoRBEController@verificaAssociacao')->middleware(['checkLogInAdmin']);
Route::get('admin/projetoUniversidade/jaAssociado/{id}-{id_projeto}-{ano}', 'ProjetoUniversidadeController@verificaAssociacao')->middleware(['checkLogInAdmin']);
Route::get('admin/projetoProfFac/jaAssociado/{id}-{id_projeto}-{ano}', 'ProjetoProfessorFaculController@verificaAssociacao')->middleware(['checkLogInAdmin']);
Route::get('admin/projetoProfessor/jaAssociado/{id}-{id_projeto}-{ano}', 'ProjetoProfessorController@verificaAssociacao')->middleware(['checkLogInAdmin']);

//ROUTES PARA A ADIÇÃO DE ASSOCIAÇÕES AOS PROJETOS

Route::post('admin/projetoEscola/add', 'ProjetoEscolaController@store')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoIlustrador/add', 'ProjetoIlustradorController@store')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoContador/add', 'ProjetoContadorController@store')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoEntidade/add', 'ProjetoEntidadeController@store')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoJuri/add', 'ProjetoJuriController@store')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoRbe/add', 'ProjetoRBEController@store')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoUniversidade/add', 'ProjetoUniversidadeController@store')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoProfFac/add', 'ProjetoProfessorFaculController@store')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoProfessor/add', 'ProjetoProfessorController@store')->middleware(['checkLogInAdmin']);

//ROUTES PARA A REMOÇÃO DE ASSOCIAÇÕES AOS PROJETOS

Route::post('admin/projetoEscola/delete/{id}-{id_projeto}-{ano}', 'ProjetoEscolaController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoIlustrador/delete/{id}-{id_projeto}-{ano}', 'ProjetoIlustradorController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoContador/delete/{id}-{id_projeto}-{ano}', 'ProjetoContadorController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoEntidade/delete/{id}-{id_projeto}-{ano}', 'ProjetoEntidadeController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoJuri/delete/{id}-{id_projeto}-{ano}', 'ProjetoJuriController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoRbe/delete/{id}-{id_projeto}-{ano}', 'ProjetoRBEController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoUniversidade/delete/{id}-{id_projeto}-{ano}', 'ProjetoUniversidadeController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoProfFac/delete/{id}-{id_projeto}-{ano}', 'ProjetoProfessorFaculController@destroy')->middleware(['checkLogInAdmin']);
Route::post('admin/projetoProfessor/delete/{id}-{id_projeto}-{ano}', 'ProjetoProfessorController@destroy')->middleware(['checkLogInAdmin']);

Route::get('admin/terminarSessao', 'UtilizadorController@realizarLogout')->middleware(['checkLogInAdmin']);

// ROUTES DE LOGIN
Route::post('login', 'UtilizadorController@realizarLogin')->name('login');

// ROUTES PARA O USER COLABORADOR