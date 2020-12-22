<?php

namespace App\Http\Controllers;

use App\Models\EscolaSolidaria;
use Illuminate\Http\Request;
use DB;
use Session;

class EscolaSolidariaController extends Controller
{
    public function index()
    {
        $escsolidarias = EscolaSolidaria::all();

        return view('admin/escolasSolidarias', ['data' => $escsolidarias]);
    }

    public function store(Request $request)
    {
        $escsolidarias = new EscolaSolidaria();

        $escsolidarias->nome = $request->nome;
        $escsolidarias->telefone = $request->telefone;
        $escsolidarias->telemovel = $request->telemovel;
        $escsolidarias->contactoAssPais = $request->contactoAssPais;
        $escsolidarias->id_agrupamento = $request->agrupamento;
        $escsolidarias = $request->disponibilidade;

        $escsolidarias->save();
    }

    public function update($id, Request $request)
    {
        $id_escola = \intval($id);
        $nome = $request->nome;
        $telefone = $request->telefone;
        $telemovel = $request->telemovel;
        $contactoAssPais = $request->contactoAssPais;
        $id_agrupamento = $request->agrupamento;
        $disponibilidade = $request->disponibilidade;

        $escola = EscolaSolidaria::find($id_escola);
        if($escola != null) {
            $escola->nome = $nome;
            $escola->telefone = $telefone;
            $escola->telemovel = $telemovel;
            $escola->contactoAssPais = $contactoAssPais;
            $escola->id_agrupamento = $id_agrupamento;
            $escola->disponivel = $disponibilidade;

            $escola->save();
            return redirect()->route("escolas");
        }
    }

    public function destroy($id)
    {
        $escola = EscolaSolidaria::find($id);
        if($escola->professores()->first() != null) {
            return redirect()->route("escolas");
        }
        if($escola->projetos()->first() != null) {
            $escola->projetos()->where('id_escolaSolidaria', $id)->delete();
        }
        $escola->delete();
        return redirect()->route("escolas");
    }

    public function getEscolaPorId($id) {
        
        $escola = DB::table('escola_solidaria')->where('id_escolaSolidaria', $id)->first();
        if($escola != null) {
            return response()->json($escola);  
        }
        else {
            return null;
        }
        
    }

    public function getNextPage() {

        $escolas = DB::table('escola_solidaria')->simplePaginate(10);
        
        if($escolas != null) {
            return response()->json($escolas);
        }
        else {
            return null;
        }
        
    }

    public function getNumEscolas() {

        $escolas = EscolaSolidaria::all();
        
        if($escolas != null) {
            return \count($escolas);
        }
        else {
            return 0;
        }
        
    }
}