<?php

namespace App\Http\Controllers;

use App\Models\ProjetoEscola;
use Illuminate\Http\Request;

class ProjetoEscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projescola = ProjetoEscola::all();

        return view('viewProjetoEscola', ['projescola' => $projescola]);
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
        $projescola = new ProjetoEscola();

        $projescola->id_projeto = $request->id_projeto;
        $projescola->id_escolaSolidaria = $request->id_escolaSolidaria;
        $projescola->anoParticipacao = $request->anoParticipacao;

        $projescola->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoEscola  $projescola
     * @return \Illuminate\Http\Response
     */
    public function show(projescola $projescola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoEscola  $projescola
     * @return \Illuminate\Http\Response
     */
    public function edit(projescola $projescola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoEscola  $projescola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projescola $projescola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoEscola  $projescola
     * @return \Illuminate\Http\Response
     */
    public function destroy(projescola $projescola)
    {
        //
    }
}