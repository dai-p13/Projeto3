<?php

namespace App\Http\Controllers;

use App\Models\ProjetoProfessorFacul;
use Illuminate\Http\Request;

class ProjetoProfessorFaculController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projprofaculdades = ProjetoProfessorFacul::all();

        return view('viewProjetoProfessorFacul', ['projprofaculdades' => $projprofaculdades]);
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
        $projprofaculdade = new ProjetoProfessorFacul();

        $projprofaculdade->id_projeto = $request->id_projeto;
        $projprofaculdade->id_professorFaculdade = $request->id_professorFaculdade;
        $projprofaculdade->anoParticipacao = $request->anoParticipacao;

        $projprofaculdade->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoProfessorFacul  $projprofaculdade
     * @return \Illuminate\Http\Response
     */
    public function show(projprofaculdade $projprofaculdade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoProfessorFacul  $projprofaculdade
     * @return \Illuminate\Http\Response
     */
    public function edit(projprofaculdade $projprofaculdade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoProfessorFacul  $projprofaculdade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projprofaculdade $projprofaculdade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoProfessorFacul  $projprofaculdade
     * @return \Illuminate\Http\Response
     */
    public function destroy(projprofaculdade $projprofaculdade)
    {
        //
    }
}