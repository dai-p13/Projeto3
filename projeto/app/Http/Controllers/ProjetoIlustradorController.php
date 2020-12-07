<?php

namespace App\Http\Controllers;

use App\Models\ProjetoIlustrador;
use Illuminate\Http\Request;

class ProjetoIlustradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projilustradores = ProjetoIlustrador::all();

        return view('viewProjetoIlustrador', ['projilustradores' => $projilustradores]);
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
        $projilustradro = new ProjetoIlustrador();

        $projilustradro->id_projeto = $request->id_projeto;
        $projilustradro->id_ilustradorSolidario = $request->id_ilustradorSolidario;
        $projilustradro->anoParticipacao = $request->anoParticipacao;

        $projilustradro->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoIlustrador  $projilustradro
     * @return \Illuminate\Http\Response
     */
    public function show(projilustradro $projilustradro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoIlustrador  $projilustradro
     * @return \Illuminate\Http\Response
     */
    public function edit(projilustradro $projilustradro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoIlustrador  $projilustradro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projilustradro $projilustradro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoIlustrador  $projilustradro
     * @return \Illuminate\Http\Response
     */
    public function destroy(projilustradro $projilustradro)
    {
        //
    }
}