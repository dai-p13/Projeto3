<?php

namespace App\Http\Controllers;

use App\Models\Agrupamento;
use Illuminate\Http\Request;
use \App\Models\CodPostal;
use \App\Models\CodPostalRua;
use DB;
use Session;
class AgrupamentoController extends Controller
{
    public function index()
    {
        $user = session()->get("utilizador");
        $agrupamentos = Agrupamento::all();
        if($user->tipoUtilizador == 0) {
            return view('admin/agrupamentos', ['data' => $agrupamentos]);
        }
        else {
            return view('colaborador/agrupamentos', ['data' => $agrupamentos]);
        }
    }

    public function store(Request $request)
    {
        $agrupamento = new Agrupamento();
        $cod_postal = new CodPostal();
        $codPostalRua = new CodPostalRua();
        
        $agrupamento->nome = $request->nome;
        $agrupamento->telefone = $request->telefone;
        $agrupamento->email = $request->email;
        $agrupamento->nomeDiretor = $request->nomeDiretor;
        $agrupamento->codPostal = $request->codPostal;
        $agrupamento->codPostalRua = $request->codPostalRua;
        $cod_postal->codPostal = $request->codPostal;
        $cod_postal->localidade = $request->localidade;
        $codPostalRua->codPostalRua = $request->codPostalRua;
        $codPostalRua->rua = $request->rua;
        $codPostalRua->numPorta = $request->numPorta;
        $codPostalRua->codPostal = $request->codPostal;

        
        $cod_postal->save();
        $codPostalRua->save();
        $agrupamento->save();
        return redirect()->route("agrupamentos");
    }
    
    public function update($id ,Request $request)
    {
        $id_agrupamento = \intval($id);
        $nome = $request->nome;
        $telefone = $request->telefone;
        $email = $request->email;
        $nomeDiretor = $request->nomeDiretor;
        $codPostal = $request->codPostal;
        $localidade = $request->localidade;
        //$codPostalRua = $request->codPostalRua;

        $agrupamento = Agrupamento::find($id_agrupamento);
        $cod_postal = CodPostal::find($codPostal);
        if($agrupamento != null) {
            $agrupamento->nome = $nome;
            $agrupamento->telefone = $telefone;
            $agrupamento->email = $email;
            $agrupamento->nomeDiretor = $nomeDiretor;
            //$agrupamento->codPostalRua = $codPostalRua;

            $agrupamento->save();
            
        }
        if($cod_postal != null) {
            $cod_postal->codPostal = $codPostal;
            $cod_postal->localidade = $localidade;
                
            $cod_postal->save();
        }
            
        return redirect()->route("agrupamentos");
    }
    
    public function destroy($id)
    {
        $agrupamento = Agrupamento::find($id);
        if($agrupamento->codpostal()->first() != null){
            $agrupamento->codpostal()->where('id_agrupamento', $id)->delete();
        }
        if($agrupamento->escolas()->first() != null){
            $agrupamento->escolas()->where('id_agrupamento', $id)->delete();
        }
        if($agrupamento->professores()->first() != null){
            $agrupamento->professores()->where('id_agrupamento', $id)->delete();
        }
        $agrupamento->delete();
        return redirect()->route("agrupamentos");
    }

    public static function getNomeAgrupamentoPorId($id) {
        
        $agrupamento = DB::table('agrupamento')->where('id_agrupamento', $id)->first();
        if($agrupamento != null) {
            return $agrupamento->nome;  
        }
        else {
            return null;
        }
        
    }

    public function getAgrupamentoPorId($id) {
        
        $agrupamento = DB::table('agrupamento')->where('id_agrupamento', $id)->first();
        if($agrupamento != null) {
            return response()->json($agrupamento);  
        }
        else {
            return null;
        }
        
    }

    public function getNextPage() {

        $agrupamento = DB::table('agrupamento')->simplePaginate(10);
        
        if($agrupamento != null) {
            return response()->json($agrupamento);
        }
        else {
            return null;
        }
        
    }

    public function getNumAgrupamentos() {

        $agrupamento = Agrupamento::all();
        
        if($agrupamento != null) {
            return \count($agrupamento);
        }
        else {
            return 0;
        }
        
    }

    public function getAll() {

        $agrupamentos = Agrupamento::all();
        
        if($agrupamentos != null) {
            return  response()->json($agrupamentos);
        }
        else {
            return null;
        }
        
    }
    
}