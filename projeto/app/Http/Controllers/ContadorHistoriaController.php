<?php

namespace App\Http\Controllers;

use App\Models\ContadorHistoria;
use Illuminate\Http\Request;

class ContadorHistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contadorHistorias = ContadorHistoria::all();

        return view('viewContadorHistoria', ['contadorHistorias' => $contadorHistorias]);
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
        $contadorHistoria = new ContadorHistoria();

        $contadorHistoria->nome = $request->nome;
        $contadorHistoria->email = $request->email;
        $contadorHistoria->telefone = $request->telefone;
        $contadorHistoria->telemovel = $request->telemovel;
        $contadorHistoria->observacoes = $request->observacoes;

        $contadorHistoria->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContadorHistoria  $contadorHistoria
     * @return \Illuminate\Http\Response
     */
    public function show(contadorHistoria $contadorHistoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContadorHistoria  $contadorHistoria
     * @return \Illuminate\Http\Response
     */
    public function edit(contadorHistoria $contadorHistoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContadorHistoria  $contadorHistoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contadorHistoria $contadorHistoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContadorHistoria  $contadorHistoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(contadorHistoria $contadorHistoria)
    {
        //
    }
}