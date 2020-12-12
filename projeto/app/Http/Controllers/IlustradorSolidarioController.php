<?php

namespace App\Http\Controllers;

use App\Models\IlustradorSolidario;
use Illuminate\Http\Request;
use DB;
use Session;
class IlustradorSolidarioController extends Controller
{
    public function index()
    {
        $user = session()->get("utilizador");
        $ilustradores = IlustradorSolidario::all();
        if($user->tipoUtilizador == 0) {
            return view('admin/ilustradores', ['data' => $ilustradores]);
        }
        else {
            return view('colaborador/ilustradores', ['data' => $ilustradores]);
        }
    }

    public function store(Request $request)
    {
        $ilusolidario = new IlustradorSolidario();

        $ilusolidario->volumeLivro = $request->volumeLivro;
        $ilusolidario->disponivel = $request->disponivel;
        $ilusolidario->nome = $request->nome;
        $ilusolidario->telefone = $request->telefone;
        $ilusolidario->telemovel = $request->telemovel;
        $ilusolidario->email = $request->email;
        $ilusolidario->observacoes = $request->obs;

        $ilusolidario->save();
        return redirect()->route("ilustradores");
    }

    public function update($id, Request $request)
    {
        $id_ilustradorSolidario = \intval($id);
        $volumeLivro = $request->volumeLivro;
        $disponivel = $request->disponibilidade;
        $nome = $request->nome;
        $telefone = $request->telefone;
        $telemovel = $request->telemovel;
        $email = $request->email;
        $observacoes = $request->obs;
        
        $ilusolidario = IlustradorSolidario::find($id_ilustradorSolidario);
        if($ilusolidario != null) {
            $ilusolidario->volumeLivro = $volumeLivro;
            $ilusolidario->disponivel = $disponivel;
            $ilusolidario->nome = $nome;
            $ilusolidario->telefone = $telefone;
            $ilusolidario->telemovel = $telemovel;
            $ilusolidario->email = $email;
            $ilusolidario->observacoes = $observacoes; 

            $ilusolidario->save();
            return redirect()->route("ilustradores");
        }
    }

    public function destroy($id)
    {
        $ilustrador = IlustradorSolidario::find($id);
        if($ilustrador->projetos()->first() != null) {
            $ilustrador->projetos()->where('id_ilustradorSolidario', $id)->delete();
        }
        $ilustrador->delete();
        return redirect()->route("ilustradores");
    }

    public function getUserNome($nomeUtilizador)
    {
        $user = DB::table('utilizador')->where('nomeUtilizador', $nomeUtilizador)->first();
        return $user;

    }

    public function getIlustradorPorId($id) {
        
        $ilustrador = DB::table('ilustrador_solidario')->where('id_ilustradorSolidario', $id)->first();
        if($ilustrador != null) {
            return response()->json($ilustrador);  
        }
        else {
            return null;
        }
        
    }

    public function getNextPage() {

        $ilustradores = DB::table('ilustrador_solidario')->simplePaginate(5);
        
        if($ilustradores != null) {
            return response()->json($ilustradores);
        }
        else {
            return null;
        }
        
    }

    public function getNumIlustradores() {

        $ilustradores = IlustradorSolidario::all();
        
        if($ilustradores != null) {
            return \count($ilustradores);
        }
        else {
            return 0;
        }
        
    }
}