<?php

namespace App\Http\Controllers;

use App\Models\ProjetoRBE;
use Illuminate\Http\Request;

class ProjetoRBEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projredes = ProjetoRBE::all();

        return view('viewProjetoRBE', ['projredes' => $projredes]);
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
        $projrede = new ProjetoRBE();

        $projrede->id_projeto = $request->id_projeto;
        $projrede->id_rbe = $request->id_rbe;
        $projrede->anoParticipacao = $request->anoParticipacao;

        $projrede->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoRBE  $projrede
     * @return \Illuminate\Http\Response
     */
    public function show(projrede $projrede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoRBE  $projrede
     * @return \Illuminate\Http\Response
     */
    public function edit(projrede $projrede)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoRBE  $projrede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projrede $projrede)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoRBE  $projrede
     * @return \Illuminate\Http\Response
     */
    public function destroy(projrede $projrede)
    {
        //
    }
}