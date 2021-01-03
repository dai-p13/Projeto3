<?php

namespace App\Http\Controllers;

use App\Models\UniversidadeProfFaculdade;
use Illuminate\Http\Request;
use DB;

class UniversidadeProfFaculdadeController extends Controller
{
    public function store(Request $request)
    {
        $profFac = new UniversidadeProfFaculdade();

        $profFac->id_universidade = intval($request->id_universidade);
        $profFac->id_professorFaculdade = intval($request->id_professorFac);

        $profFac->save();

        $user = session()->get("utilizador");
        if($user->tipoUtilizador == 0) {
            return redirect()->route("gerirUniversidade", ['id' => intval($request->id_universidade)]);
        }
        else {
            return redirect()->route("gerirUniversidadeColaborador", ['id' => intval($request->id_universidade)]);
        }

    }

    public function destroy($id, $id_universidade)
    {
        $linha = DB::table('universidade_prof_faculdade')
                    ->where([
                        ['universidade_prof_faculdade.id_universidade', '=', $id_universidade],
                        ['universidade_prof_faculdade.id_professorFaculdade', '=', $id],
                        ]);
        
        
        if($linha->first() != null) {
            $linha->delete(); 
        }

        $user = session()->get("utilizador");
        if($user->tipoUtilizador == 0) {
            return redirect()->route("gerirUniversidade", ['id' => intval($id_universidade)]);
        }
        else {
            return redirect()->route("gerirUniversidadeColaborador", ['id' => intval($id_universidade)]);
        }
    }

    public function getProfessores() {
        $id = intval(\session('id_universidade'));
        
        $professores = DB::table('professor_faculdade')
                        ->join('universidade_prof_faculdade', 'professor_faculdade.id_professorFaculdade', '=', 'universidade_prof_faculdade.id_professorFaculdade')
                        ->select('professor_faculdade.id_professorFaculdade' , 'professor_faculdade.nome', 'professor_faculdade.cargo', 
                        'professor_faculdade.telemovel', 'professor_faculdade.telefone', 'professor_faculdade.email')
                        ->where([
                            ['universidade_prof_faculdade.id_universidade', '=', $id]
                            ])
                        ->get();


        return response()->json($professores); 
    }
}