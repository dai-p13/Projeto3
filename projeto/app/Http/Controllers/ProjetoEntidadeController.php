<?php

namespace App\Http\Controllers;

use App\Models\ProjetoEntidade;
use Illuminate\Http\Request;

class ProjetoEntidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projentidade = ProjetoEntidade::all();

        return view('viewProjetoEntidade', ['projentidade' => $projentidade]);
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
        $projentidade = new ProjetoEntidade();

        $projentidade->id_projeto = $request->id_projeto;
        $projentidade->id_entidadeOficial = $request->id_entidadeOficial;
        $projentidade->anoParticipacao = $request->anoParticipacao;

        $projentidade->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoEntidade  $projentidade
     * @return \Illuminate\Http\Response
     */
    public function show(projentidade $projentidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoEntidade  $projentidade
     * @return \Illuminate\Http\Response
     */
    public function edit(projentidade $projentidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoEntidade  $projentidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projentidade $projentidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoEntidade  $projentidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(projentidade $projentidade)
    {
        //
    }
}