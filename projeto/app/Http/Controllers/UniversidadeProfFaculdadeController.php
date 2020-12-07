<?php

namespace App\Http\Controllers;

use App\Models\UniversidadeProfFaculdade;
use Illuminate\Http\Request;

class UniversidadeProfFaculdadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uniproffaculdades = UniversidadeProfFaculdade::all();

        return view('viewUniversidadeProfFaculdade', ['uniproffaculdades' => $uniproffaculdades]);
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
        $uniproffaculdade = new UniversidadeProfFaculdade();

        $uniproffaculdade->id_universidade = $request->id_universidade;
        $uniproffaculdade->id_professorFaculdade = $request->id_professorFaculdade;

        $uniproffaculdade->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniversidadeProfFaculdade  $uniproffaculdade
     * @return \Illuminate\Http\Response
     */
    public function show(uniproffaculdade $uniproffaculdade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniversidadeProfFaculdade  $uniproffaculdade
     * @return \Illuminate\Http\Response
     */
    public function edit(uniproffaculdade $uniproffaculdade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniversidadeProfFaculdade  $uniproffaculdade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, uniproffaculdade $uniproffaculdade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniversidadeProfFaculdade  $uniproffaculdade
     * @return \Illuminate\Http\Response
     */
    public function destroy(uniproffaculdade $uniproffaculdade)
    {
        //
    }
}