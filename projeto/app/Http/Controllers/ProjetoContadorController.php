<?php

namespace App\Http\Controllers;

use App\Models\ProjetoContador;
use Illuminate\Http\Request;
use DB;

class ProjetoContadorController extends Controller
{
    public function store(Request $request)
    {
        $projcontador = new ProjetoContador();

        $projcontador->id_projeto = intval($request->id_projeto);
        $projcontador->id_contador = intval($request->id_elemento);
        $projcontador->anoParticipacao = intval($request->anoParticipacao);

        $projcontador->save();

        $user = session()->get("utilizador");
        if($user->tipoUtilizador == 0) {
            return redirect()->route("gerirProjeto", ['id' => intval($request->id_projeto)]);
        }
        else {
            return redirect()->route("gerirProjetoColaborador", ['id' => intval($request->id_projeto)]);
        }
    }

    public function destroy($id, $id_projeto, $ano)
    {
        $linha = DB::table('projeto_contador')
                    ->where([
                        ['projeto_contador.id_projeto', '=', $id_projeto],
                        ['projeto_contador.id_contador', '=', $id],
                        ['projeto_contador.anoParticipacao', '=', $ano]
                        ]);
        if($linha->first() != null) {
            $linha->delete(); 
        }
        return redirect()->route("gerirProjeto", ['id' => intval($id_projeto)]);
    }

    public function verificaAssociacao($id, $id_projeto, $ano)
    {
        $exite = false;
        $linha = DB::table('projeto_contador')
                    ->where([
                        ['projeto_contador.id_projeto', '=', $id_projeto],
                        ['projeto_contador.id_contador', '=', $id],
                        ['projeto_contador.anoParticipacao', '=', $ano]
                        ])
                    ->get();
        if(count($linha) > 0) {
            $exite = true;
        }

        return \json_encode($exite);
    }
}