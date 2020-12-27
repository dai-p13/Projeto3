<?php

namespace App\Http\Controllers;

use App\Models\ProjetoJuri;
use Illuminate\Http\Request;
use DB;

class ProjetoJuriController extends Controller
{

    public function store(Request $request)
    {
        $projjuri = new ProjetoJuri();

        $projjuri->id_projeto = intval($request->id_projeto);
        $projjuri->id_juri = intval($request->id_elemento);
        $projjuri->anoParticipacao = intval($request->anoParticipacao);

        $projjuri->save();
        return redirect()->route("gerirProjeto", ['id' => intval($request->id_projeto)]);
    }

    public function destroy($id, $id_projeto, $ano)
    {
        $linha = DB::table('projeto_juri')
        ->where([
            ['projeto_juri.id_projeto', '=', $id_projeto],
            ['projeto_juri.id_juri', '=', $id],
            ['projeto_juri.anoParticipacao', '=', $ano]
            ]);
        
        
        if($linha->first() != null) {
            $linha->delete(); 
        }
        return redirect()->route("gerirProjeto", ['id' => intval($id_projeto)]);
    }

    public function verificaAssociacao($id, $id_projeto, $ano)
    {
        $exite = false;
        $linha = DB::table('projeto_juri')
                    ->where([
                        ['projeto_juri.id_projeto', '=', $id_projeto],
                        ['projeto_juri.id_juri', '=', $id],
                        ['projeto_juri.anoParticipacao', '=', $ano]
                        ])
                    ->get();
        if(count($linha) > 0) {
            $exite = true;
        }

        return \json_encode($exite);
    }
}