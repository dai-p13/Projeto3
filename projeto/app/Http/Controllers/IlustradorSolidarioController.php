<?php

namespace App\Http\Controllers;

use App\Models\IlustradorSolidario;
use Illuminate\Http\Request;

class IlustradorSolidarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ilusolidario = IlustradorSolidario::all();

        return view('viewIlustradorSolidario', ['ilusolidario' => $ilusolidario]);
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
        $ilusolidario = new IlustradorSolidario();

        $ilusolidario->volumeLivro = $request->volumeLivro;
        $ilusolidario->disponivel = $request->disponivel;
        $ilusolidario->nome = $request->nome;
        $ilusolidario->telefone = $request->telefone;
        $ilusolidario->telemovel = $request->telemovel;
        $ilusolidario->email = $request->email;
        $ilusolidario->observacoes = $request->observacoes;

        $ilusolidario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IlustradorSolidario  $ilusolidario
     * @return \Illuminate\Http\Response
     */
    public function show(ilusolidario $ilusolidario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IlustradorSolidario  $ilusolidario
     * @return \Illuminate\Http\Response
     */
    public function edit(ilusolidario $ilusolidario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IlustradorSolidario  $ilusolidario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ilusolidario $ilusolidario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IlustradorSolidario  $ilusolidario
     * @return \Illuminate\Http\Response
     */
    public function destroy(ilusolidario $ilusolidario)
    {
        //
    }
}