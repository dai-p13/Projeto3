<?php

namespace App\Http\Controllers;

use App\Models\TrocaAgrupamento;
use Illuminate\Http\Request;

class TrocaAgrupamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trocas = TrocaAgrupamento::all();

        return view('viewTrocaAgrupamento', ['trocas' => $trocas]);
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
        $trocas = new TrocaAgrupamento();

        $trocas->agrupamentoAntigo = $request->agrupamentoAntigo;
        $trocas->novoAgrupamento = $request->novoAgrupamento;
        $trocas->observacoes = $request->observacoes;
        $trocas->id_professor = $request->id_professor;

        $trocas->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrocaAgrupamento  $trocas
     * @return \Illuminate\Http\Response
     */
    public function show(trocas $trocas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrocaAgrupamento  $trocas
     * @return \Illuminate\Http\Response
     */
    public function edit(trocas $trocas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrocaAgrupamento  $trocas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trocas $trocas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrocaAgrupamento  $trocas
     * @return \Illuminate\Http\Response
     */
    public function destroy(trocas $trocas)
    {
        //
    }
}