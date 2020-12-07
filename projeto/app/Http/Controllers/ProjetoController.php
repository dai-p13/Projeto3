<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use DB;
use Session;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilizador = Session::get('utilizador');
        if(isset($utilizador)) {
            $projetos = Projeto::all();
            if($utilizador->tipoUtilizador == 0) {
                return view('admin/pagInicial', ['projetos' => $projetos]);
            }
            else {
                return view('colaborador/pagInicial', ['projetos' => $projetos]);
            }
        }
        return view('login');
    }

    public function getProjetoPorId($id)
    {
        $utilizador = Session::get('utilizador');
        if(isset($utilizador)) {
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
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show(projeto $projeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit(projeto $projeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projeto $projeto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(projeto $projeto)
    {
        //
    }
}