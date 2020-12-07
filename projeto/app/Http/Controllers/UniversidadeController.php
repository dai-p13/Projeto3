<?php

namespace App\Http\Controllers;

use App\Models\Universidade;
use Illuminate\Http\Request;

class UniversidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universidades = Universidade::all();

        return view('viewUniversidade', ['universidades' => $universidades]);
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
        $universidade = new Universidade();

        $universidade->curso = $request->curso;
        $universidade->tipo = $request->tipo;
        $universidade->nome = $request->nome;
        $universidade->telefone = $request->telefone;
        $universidade->telemovel = $request->telemovel;
        $universidade->email = $request->email;

        $universidade->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Universidade  $universidade
     * @return \Illuminate\Http\Response
     */
    public function show(universidade $universidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Universidade  $universidade
     * @return \Illuminate\Http\Response
     */
    public function edit(universidade $universidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Universidade  $universidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, universidade $universidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Universidade  $universidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(universidade $universidade)
    {
        //
    }
}