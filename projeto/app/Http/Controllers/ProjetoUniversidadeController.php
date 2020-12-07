<?php

namespace App\Http\Controllers;

use App\Models\ProjetoUniversidade;
use Illuminate\Http\Request;

class ProjetoUniversidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projuniversidades = ProjetoUniversidade::all();

        return view('viewProjetoUniversidade', ['projuniversidades' => $projuniversidades]);
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
        $projuniversidade = new ProjetoUniversidade();

        $projuniversidade->id_projeto = $request->id_projeto;
        $projuniversidade->id_universidade = $request->id_universidade;
        $projuniversidade->anoParticipacao = $request->anoParticipacao;

        $projuniversidade->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoUniversidade  $projuniversidade
     * @return \Illuminate\Http\Response
     */
    public function show(projuniversidade $projuniversidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoUniversidade  $projuniversidade
     * @return \Illuminate\Http\Response
     */
    public function edit(projuniversidade $projuniversidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoUniversidade  $projuniversidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projuniversidade $projuniversidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoUniversidade  $projuniversidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(projuniversidade $projuniversidade)
    {
        //
    }
}