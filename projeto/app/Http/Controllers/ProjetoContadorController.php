<?php

namespace App\Http\Controllers;

use App\Models\ProjetoContador;
use Illuminate\Http\Request;

class ProjetoContadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projcontadores = ProjetoContador::all();

        return view('viewProjetoContador', ['projcontadores' => $projcontadores]);
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
        $projcontador = new ProjetoContador();

        $projcontador->id_projeto = $request->id_projeto;
        $projcontador->id_contador = $request->id_contador;
        $projcontador->anoParticipacao = $request->anoParticipacao;

        $projcontador->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoContador  $projcontador
     * @return \Illuminate\Http\Response
     */
    public function show(projcontador $projcontador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoContador  $projcontador
     * @return \Illuminate\Http\Response
     */
    public function edit(projcontador $projcontador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoContador  $projcontador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projcontador $projcontador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoContador  $projcontador
     * @return \Illuminate\Http\Response
     */
    public function destroy(projcontador $projcontador)
    {
        //
    }
}