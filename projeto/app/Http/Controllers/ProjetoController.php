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

    public function create()
    {
        //
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

    public function show(projeto $projeto)
    {
        //
    }

    public function edit(projeto $projeto)
    {
        //
    }

    public function update(Request $request, projeto $projeto)
    {
        //
    }

    public function destroy(projeto $projeto)
    {
        //
    }
}