<?php

namespace App\Http\Controllers;

use App\Models\EscolaSolidaria;
use Illuminate\Http\Request;

class EscolaSolidariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escsolidarias = EscolaSolidaria::all();

        return view('viewEscolaSolidaria', ['escsolidarias' => $escsolidarias]);
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
        $escsolidarias = new EscolaSolidaria();

        $escsolidarias->nome = $request->nome;
        $escsolidarias->telefone = $request->telefone;
        $escsolidarias->telemovel = $request->telemovel;
        $escsolidarias->contactoAssPais = $request->contactoAssPais;
        $escsolidarias->id_agrupamento = $request->id_agrupamento;

        $escsolidarias->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EscolaSolidaria  $escsolidarias
     * @return \Illuminate\Http\Response
     */
    public function show(escsolidarias $escsolidarias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EscolaSolidaria  $escsolidarias
     * @return \Illuminate\Http\Response
     */
    public function edit(escsolidarias $escsolidarias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EscolaSolidaria  $escsolidarias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, escsolidarias $escsolidarias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EscolaSolidaria  $escsolidarias
     * @return \Illuminate\Http\Response
     */
    public function destroy(escsolidarias $escsolidarias)
    {
        //
    }
}