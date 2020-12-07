<?php

namespace App\Http\Controllers;

use App\Models\ProjetoJuri;
use Illuminate\Http\Request;

class ProjetoJuriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projjuris = ProjetoJuri::all();

        return view('viewProjetoJuri', ['projjuris' => $projjuris]);
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
        $projjuri = new ProjetoJuri();

        $projjuri->id_projeto = $request->id_projeto;
        $projjuri->id_juri = $request->id_juri;
        $projjuri->anoParticipacao = $request->anoParticipacao;

        $projjuri->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoJuri  $projjuri
     * @return \Illuminate\Http\Response
     */
    public function show(projjuri $projjuri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoJuri  $projjuri
     * @return \Illuminate\Http\Response
     */
    public function edit(projjuri $projjuri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoJuri  $projjuri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projjuri $projjuri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoJuri  $projjuri
     * @return \Illuminate\Http\Response
     */
    public function destroy(projjuri $projjuri)
    {
        //
    }
}