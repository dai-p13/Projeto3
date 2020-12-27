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

        $professor = Professor::find($id_professor);
        if($professor != null) {
            $professor->nome = $nome;
            $professor->telefone = $telefone;
            $professor->telemovel = $telemovel;
            $professor->email = $email;

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
            $professor->agrupamento()->where('id_professor', $id)->delete();
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
    
    public function getDisponiveis() {
        $profs = DB::table('professor')
                    ->select('professor.id_professor', 'professor.telemovel', 'professor.telefone', 'professor.nome')
                    ->where([
                        ['professor.disponivel', '=', 0]
                        ])
                    ->get();  
    
        return \json_encode($profs);
    }
    
}