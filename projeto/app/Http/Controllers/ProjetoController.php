<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use DB;
use Session;

class ProjetoController extends Controller
{
    public function index()
    {
        $user = session()->get("utilizador");
        $projetos = Projeto::all();
        if($user->tipoUtilizador == 0) {
            return view('admin/pagInicial', ['projetos' => $projetos]);
        }
        else {
            return view('colaborador/pagInicial', ['projetos' => $projetos]);
        }
    }

    public function store(Request $request)
    {
        $projeto = new Projeto();

        $projeto->nome = $request->nome;
        $projeto->objetivos = $request->objetivos;
        $projeto->regulamento = $request->regulamento;
        $projeto->publicoAlvo = $request->publicoAlvo;
        $projeto->observacoes = $request->observacoes;

        $projeto->save();
    }

    public function update(Request $request, projeto $projeto)
    {
        //
    }

    public function destroy($id)
    {
        $projeto = Projeto::find($id);
        if($projeto != null) {
            if($projeto->utilizadores()->first() != null) {
                $projeto->utilizadores()->where('id_projeto', $id)->delete();
            } 
            if($projeto->ilustradores()->first() != null) {
                $projeto->ilustradores()->where('id_projeto', $id)->delete();
            }
            if($projeto->juris()->first() != null) {
                $projeto->juris()->where('id_projeto', $id)->delete();
            }
            if($projeto->professores()->first() != null) {
                $projeto->professores()->where('id_projeto', $id)->delete();
            }
            if($projeto->professoresFacul()->first() != null) {
                $projeto->professoresFacul()->where('id_projeto', $id)->delete();
            }
            $projeto->delete();    
        }
        return redirect()->route("ilustradores");
    }

    public function getProjetoPorId($id)
    {
        $projeto = DB::table('projeto')
        ->where('id_projeto', $id)->first();
        if($projeto != null) {
            $objProjeto = new \stdClass();
            $objProjeto->id_projeto = $projeto->id_projeto;
            $objProjeto->nome = $projeto->nome;
            $objProjeto->objetivos = $projeto->objetivos;
            $objProjeto->publicoAlvo = $projeto->publicoAlvo;
            $objProjeto->observacoes = $projeto->observacoes;
            return response()->json(array('sucesso' => true, 'projeto' => $objProjeto));
        }
    }

    public function getNextPage() {

        $projetos = DB::table('projeto')->select('id_projeto','nome', 'objetivos',
        'publicoAlvo', 'observacoes')->simplePaginate(10);
        
        if($projetos != null) {
            return response()->json($projetos);
        }
        else {
            return null;
        }
        
    }

    public function getNumProjetos() {

        $projeto = Projeto::all();
        
        if($projeto != null) {
            return \count($projeto);
        }
        else {
            return 0;
        }
        
    }
}