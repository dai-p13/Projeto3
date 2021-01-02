<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use DB;
use Session;
class ProfessorController extends Controller
{
    public function index()
    {
        $user = session()->get("utilizador");
        $professores = Professor::all();
        if($user->tipoUtilizador == 0) {
            return view('admin/professores', ['data' => $professores]);
        }
        else {
            return view('colaborador/professores', ['data' => $professores]);
        }
    }

    public function store(Request $request)
    {
        $professor = new Professor();

        $professor->nome = $request->nome;
        $professor->telefone = $request->telefone;
        $professor->telemovel = $request->telemovel;
        $professor->email = $request->email;
        $professor->disponivel = $request->disponibilidade;
        $professor->id_agrupamento = $request->id_agrupamento;
        
        $professor->save();
        return redirect()->route("professores");
    }
    
    public function update($id ,Request $request)
    {
        $id_professor = \intval($id);
        $nome = $request->nome;
        $telefone = $request->telefone;
        $telemovel = $request->telemovel;
        $email = $request->email;
        $disponivel = $request->disponibilidade;

        $professor = Professor::find($id_professor);
        if($professor != null) {
            $professor->nome = $nome;
            $professor->telefone = $telefone;
            $professor->telemovel = $telemovel;
            $professor->email = $email;
            $professor->disponivel = $disponivel;

            $professor->save();
            return redirect()->route("professores");
        }
    }
    
    public function destroy($id)
    {
        $professor = Professor::find($id);
        if($professor->projetos()->first() != null) {
            $professor->projetos()->where('id_professor', $id)->delete();
        }
        if($professor->escolas()->first() != null) {
            $professor->escolas()->where('id_professor', $id)->delete();
        }
        if($professor->trocasAgrupamento()->first() != null) {
            $professor->trocasAgrupamento()->where('id_professor', $id)->delete();
        }
        if($professor->agrupamento()->first() != null) {
            $professor->id_agrupamento = null;
            $professor->save();
        }
        $professor->delete();
        return redirect()->route("professores");
    }

    public function getProfPorId($id) {
        
        $professor = DB::table('professor')->where('id_professor', $id)->first();
        if($professor != null) {
            return response()->json($professor);  
        }
        else {
            return null;
        }
        
    }

    public function getNextPage() {

        $professor = DB::table('professor')->simplePaginate(10);
        
        if($professor != null) {
            return response()->json($professor);
        }
        else {
            return null;
        }
        
    }

    public function getNumProfs() {

        $professor = Professor::all();
        
        if($professor != null) {
            return \count($professor);
        }
        else {
            return 0;
        }
        
    }

    public function existeAssociacao($id_professor, $id_escola) {
        
        $professor = DB::table('professor')
                    ->join('escola_professor', 'professor.id_professor', '=', 'escola_professor.id_professor')
                    ->where([
                        ['escola_professor.id_professor', '=', $id_professor],
                        ['escola_professor.id_escola', '=', $id_escola]
                        ])
                    ->first();

        if($professor != null) {
            return true;
        }
        else {
            return false;
        }
    }
    
    public function getDisponiveisSemEscola($id_escola) {
        $profsSemEscola = array();
        
        $profs = DB::table('professor')
                    ->select('professor.id_professor', 'professor.telemovel', 'professor.telefone', 'professor.email', 'professor.nome')
                    ->where([
                        ['professor.disponivel', '=', 0]
                        ])
                    ->get();

        foreach($profs as $professor) {
            $existe = self::existeAssociacao($professor->id_professor, $id_escola);
            if($existe == false) {
                array_push($profsSemEscola, $professor);
            }
        }
        
        return \json_encode($profsSemEscola);
    }
}