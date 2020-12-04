<?php

namespace App\Http\Controllers;

use App\Models\Utilizador;
use Illuminate\Http\Request;

class UtilizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilizadores = Utilizador::all();

        return view('viewUsers', ['utilizadores' => $utilizadores]);
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
        $utilizador = new Utilizador();

        $utilizador->nome = $request->nome;
        $utilizador->telemovel = $request->telemovel;
        $utilizador->telefone = $request->telefone;
        $utilizador->email = $request->email;
        $utilizador->tipoUtilizador = $request->tipoUtilizador;
        $utilizador->departamento = $request->departamento;

        $utilizador->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function show(utilizador $utilizador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function edit(utilizador $utilizador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, utilizador $utilizador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilizador  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function destroy(utilizador $utilizador)
    {
        //
    }
}
