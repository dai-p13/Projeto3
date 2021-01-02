<?php

namespace App\Http\Controllers;

use App\Models\ProjetoUtilizador;
use Illuminate\Http\Request;
use DB;
use App\Models\Projeto;

class ProjetoUtilizadorController extends Controller
{
    public function store(Request $request)
    {
        $projutilizador = new ProjetoUtilizador();

        $projutilizador->id_projeto = $request->id_projeto;
        $projutilizador->id_utilizador = $request->id_utilizador;

        $projutilizador->save();
        
        $user = session()->get("utilizador");
        if($user->tipoUtilizador == 0) {
            return redirect()->route("gerirProjeto", ['id' => intval($request->id_projeto)]);
        }
        else {
            return redirect()->route("gerirProjetoColaborador", ['id' => intval($request->id_projeto)]);
        }
    }

    public function destroy($id, $id_projeto)
    {
        $linha = DB::table('projeto_utilizador')
                    ->where([
                        ['projeto_utilizador.id_projeto', '=', $id_projeto],
                        ['projeto_utilizador.id_utilizador', '=', $id]
                        ]);

        if($linha->first() != null) {
            $linha->delete(); 
        }

        return redirect()->route("projetosUtilizador", ['id' => $id]);
    }

    public function getProjetosAssociados($id) {
        $linhas = DB::table('projeto_utilizador')
            ->join('projeto', 'projeto_utilizador.id_projeto', '=', 'projeto.id_projeto')
            ->select('projeto_utilizador.id_projeto' , 'projeto_utilizador.id_utilizador', 'projeto.nome')
            ->where([
            ['projeto_utilizador.id_utilizador', '=', $id],
            ])
            ->get();
        
        if(count($linhas) > 0) {
            return \json_encode($linhas);
        }
        else {
            return null;
        }
    }
}