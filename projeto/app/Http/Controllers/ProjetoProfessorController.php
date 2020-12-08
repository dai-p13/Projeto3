<?php

namespace App\Http\Controllers;

use App\Models\ProjetoProfessor;
use Illuminate\Http\Request;

class ProjetoProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projprofessores = ProjetoProfessor::all();

        return view('viewProjetoProfessor', ['projprofessores' => $projprofessores]);
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
        $projcontador = new ProjetoProfessor();

        $projcontador->id_projeto = $request->id_projeto;
        $projcontador->id_professor = $request->id_professor;
        $projcontador->anoParticipacao = $request->anoParticipacao;
        $projcontador->id_cargo = $request->id_cargo;

        $projcontador->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoProfessor  $projcontador
     * @return \Illuminate\Http\Response
     */
    public function show(projcontador $projcontador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoProfessor  $projcontador
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
     * @param  \App\Models\ProjetoProfessor  $projcontador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projcontador $projcontador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoProfessor  $projcontador
     * @return \Illuminate\Http\Response
     */
    public function destroy(projcontador $projcontador)
    {
        //
    }
}