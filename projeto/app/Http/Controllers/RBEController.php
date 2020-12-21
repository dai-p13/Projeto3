<?php

namespace App\Http\Controllers;

use App\Models\RBE;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class RBEController extends Controller
{
    public function index()
    {
        $user = session()->get("utilizador");
        $rbes = RBE::all();
        if($user->tipoUtilizador == 0) {
            return view('admin\rbes', ['data' => $rbes]);
        }
        else {
            return view('colaborador\rbes', ['data' => $rbes]);
        }
    }

    public function store(Request $request)
    {
        $rbe = new RBE();

        $rbe->regiao = $request->regiao;
        $rbe->nomeCoordenador = $request->nome;
        $rbe->id_concelho = $request->id_concelho;
        $rbe->disponivel = $request->disponibilidade;

        $rbe->save();
        return redirect()->route("rbes");
    }

    public function update($id, Request $request)
    {
        $id_rbe = \intval($id);
        $regiao = $request->regiao;
        $nomeCoordenador = $request->nome;
        $id_concelho = $request->id_concelho;
        $disponivel = $request->disponibilidade;
        
        $rbe = RBE::find($id_rbe);
        if($rbe != null) {
            $rbe->regiao = $regiao;
            $rbe->nomeCoordenador = $nomeCoordenador;
            $rbe->id_concelho = $id_concelho;
            $rbe->disponivel = $disponivel;

            $rbe->save();
            return redirect()->route("rbes");
        }
    }


    public function destroy($id)
    {
        $rbe = RBE::find($id);
        if($rbe->projetos()->first() != null) {
            $rbe->projetos()->where('id_rbe', $id)->delete();
        }
        $rbe->delete();
        return redirect()->route("rbes");
    }

    public function getRbePorId($id) {
        
        $rbe = DB::table('rbe')->where('id_rbe', $id)->first();
        if($rbe != null) {
            return response()->json($rbe);  
        }
        else {
            return null;
        }
        
    }

    public function getNextPage() {

        $rbe = DB::table('rbe')->simplePaginate(10);
        
        if($rbe != null) {
            return response()->json($rbe);
        }
        else {
            return null;
        }
        
    }

    public function getNumRbes() {

        $rbes = RBE::all();
        
        if($rbes != null) {
            return \count($rbes);
        }
        else {
            return 0;
        }
        
    }
}