<?php

namespace App\Http\Controllers;

use App\Models\Universidade;
use Illuminate\Http\Request;
use DB;

class UniversidadeController extends Controller
{
    public function index()
    {
        $uni = session()->get("utilizador");
        $universidades = Universidade::all();
        if($uni->tipoUtilizador == 0) {
            return view('admin/universidade', ['universidades' => $universidades]);
        }
        else {
            return view('colaborador/universidade', ['universidades' => $universidades]);
        }

        //return view('viewUniversidade', ['universidades' => $universidades]);
    }

    public function store(Request $request)
    {
        $curso = $request->get("curso");
        $tipo = $request->get("tipo");
        $nome = $request->get("nome");
        $telefone = $request->get("telefone");
        $telemovel = $request->get("telemovel");
        $email = $request->get("email");
        
        $universidade = self::getUniNome($nome);
        if($universidade != null) {
            $universidade = new Universidade();
            
            $universidade->curso = $request->curso;
            $universidade->tipo = $request->tipo;
            $universidade->nome = $request->nome;
            $universidade->telefone = $request->telefone;
            $universidade->telemovel = $request->telemovel;
            $universidade->email = $request->email;
            
            $universidade->save();
            return redirect()->route("universidade");
        }
        
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
        
        $universidade = Universidade::find($id_universidade);
        if($universidade != null) {            
            $universidade->curso = $curso;
            $universidade->tipo = $tipo;
            $universidade->nome = $nome;
            $universidade->telefone = $telefone;
            $universidade->telemovel = $telemovel;
            $universidade->email = $email;
            
            $universidade->save();
            return redirect()->route("universidade");
        }
    }
    
    public function destroy($id)
    {
       $universidade = Universidade::find($id);
       $universidade->delete();
       return redirect()->route("universidade"); 
    }

    public function getUniId($id)
    {
        return ['universidade' => Universidade::findOrFail($id)];
    }

    public function getUserNome($nome)
    {
        $nomeUni = DB::table('universidade')->where('nome', $nome)->first();
        return $nomeUni;

    }

    public function getUniPorId($id) {
        
        $uni = DB::table('universidade')->where('id_uuniversidade', $id)->first();
        if($uni != null) {
            return response()->json($uni);  
        }
        else {
            return null;
        }
        
    }

    public function getNumUni() {

        $universidades = Universidade::all();
        
        if($universidades != null) {
            return \count($universidades);
        }
        else {
            return 0;
        }
        
    }
}