<?php

namespace App\Http\Controllers;

use App\Models\ProjetoUtilizador;
use Illuminate\Http\Request;

class ProjetoUtilizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projutilizadores = ProjetoUtilizador::all();

        return view('viewProjetoUtilizador', ['projutilizadores' => $projutilizadores]);
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
        $projutilizador = new ProjetoUtilizador();

        $projutilizador->id_projeto = $request->id_projeto;
        $projutilizador->id_utilizador = $request->id_utilizador;

        $projutilizador->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoUtilizador  $projutilizador
     * @return \Illuminate\Http\Response
     */
    public function show(projutilizador $projutilizador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoUtilizador  $projutilizador
     * @return \Illuminate\Http\Response
     */
    public function edit(projutilizador $projutilizador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoUtilizador  $projutilizador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projutilizador $projutilizador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoUtilizador  $projutilizador
     * @return \Illuminate\Http\Response
     */
    public function destroy(projutilizador $projutilizador)
    {
        //
    }
}