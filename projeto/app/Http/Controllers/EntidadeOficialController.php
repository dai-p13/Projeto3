<?php

namespace App\Http\Controllers;

use App\Models\EntidadeOficial;
use Illuminate\Http\Request;
use DB;

class EntidadeOficialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entOficiais = EntidadeOficial::all();

        return view('viewEntidadeOficial', ['entOficiais' => $entOficiais]);
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
        $entoficial = new EntidadeOficial();

        $entoficial->nome = $request->nome;
        $entoficial->email = $request->email;
        $entoficial->entidade = $request->entidade;
        $entoficial->telefone = $request->telefone;
        $entoficial->telemove = $request->telemovel;
        $entoficial->observacoes = $request->observacoes;

        $entoficial->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntidadeOficial  $entoficial
     * @return \Illuminate\Http\Response
     */
    public function show(entoficial $entoficial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntidadeOficial  $entoficial
     * @return \Illuminate\Http\Response
     */
    public function edit(entoficial $entoficial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EntidadeOficial  $entoficial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, entoficial $entoficial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntidadeOficial  $entoficial
     * @return \Illuminate\Http\Response
     */
    public function destroy(entoficial $entoficial)
    {
        //
    }

    public function getDisponiveis() {
        $entidades = DB::table('entidade_oficial')
                    ->select('entidade_oficial.id_entidadeOficial', 'entidade_oficial.telefone', 'entidade_oficial.telemovel', 'entidade_oficial.email', 'entidade_oficial.nome')
                    ->where([
                        ['entidade_oficial.disponivel', '=', 0]
                        ])
                    ->get();  
    
        return \json_encode($entidades);
    }
}