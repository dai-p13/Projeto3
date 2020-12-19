<?php

namespace App\Http\Controllers;

use App\Models\Universidade;
use Illuminate\Http\Request;
use DB;

class UniversidadeController extends Controller
{
    public function index()
    {
        $user = session()->get("utilizador");
        $universidades = Universidade::all();
        if($user->tipoUtilizador == 0) {
            return view('admin/universidades', ['data' => $universidades]);
        }
        else {
            return view('colaborador/universidades', ['data' => $universidades]);
        }
    }

    public function store(Request $request)
    {
        $curso = $request->get("curso");
        $tipo = $request->get("tipo");
        $nome = $request->get("nome");
        $telefone = $request->get("telefone");
        $telemovel = $request->get("telemovel");
        $email = $request->get("email");
        $disponibilidade = $request->get("disponibilidade");
        
        $universidade = new Universidade();
            
        $universidade->curso = $curso;
        $universidade->tipo = $tipo;
        $universidade->nome = $nome;
        $universidade->telefone = $telefone;
        $universidade->telemovel = $telemovel;
        $universidade->email = $email;
        $universidade->disponivel = $disponibilidade;
            
        $universidade->save();
        return redirect()->route("universidades");
        
    }
    
    public function update($id, Request $request)
    {
        $id_universidade = \intval($id);
        $curso = $request->get("curso");
        $tipo = $request->get("tipo");
        $nome = $request->get("nome");
        $telefone = $request->get("telefone");
        $telemovel = $request->get("telemovel");
        $email = $request->get("email");
        $disponibilidade = $request->get("disponibilidade");
        
        $universidade = Universidade::find($id_universidade);
        if($universidade != null) {            
            $universidade->curso = $curso;
            $universidade->tipo = $tipo;
            $universidade->nome = $nome;
            $universidade->telefone = $telefone;
            $universidade->telemovel = $telemovel;
            $universidade->email = $email;
            $universidade->disponivel = $disponibilidade;
            
            $universidade->save();
            return redirect()->route("universidades");
        }
    }
    
    public function destroy($id)
    {
       $universidade = Universidade::find($id);
       $universidade->delete();
       return redirect()->route("universidades"); 
    }

    public function getUniversidadePorId($id) {
        
        $uni = DB::table('universidade')->where('id_universidade', $id)->first();
        if($uni != null) {
            return response()->json($uni);  
        }
        else {
            return null;
        }
        
    }

    public function getNextPage() {

        $universidades = DB::table('universidade')->simplePaginate(10);
        
        if($universidades != null) {
            return response()->json($universidades);
        }
        else {
            return null;
        }
        
    }

    public function getNumUniversidades() {

        $universidades = Universidade::all();
        
        if($universidades != null) {
            return \count($universidades);
        }
        else {
            return 0;
        }
        
    }
}