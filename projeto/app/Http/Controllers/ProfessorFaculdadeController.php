<?php

namespace App\Http\Controllers;

use App\Models\ProfessorFaculdade;
use Illuminate\Http\Request;

class ProfessorFaculdadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profacul = ProfessorFaculdade::all();

        return view('viewProfessorFaculdade', ['profacul' => $profacul]);
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
        $profacul = new ProfessorFaculdade();

        $profacul->cargo = $request->cargo;
        $profacul->nome = $request->nome;
        $profacul->telefone = $request->telefone;
        $profacul->telemovel = $request->telemovel;
        $profacul->email = $request->email;
        $profacul->observacoes = $request->observacoes;

        $profacul->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfessorFaculdade  $profacul
     * @return \Illuminate\Http\Response
     */
    public function show(profacul $profacul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfessorFaculdade  $profacul
     * @return \Illuminate\Http\Response
     */
    public function edit(profacul $profacul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfessorFaculdade  $profacul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profacul $profacul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfessorFaculdade  $profacul
     * @return \Illuminate\Http\Response
     */
    public function destroy(profacul $profacul)
    {
        //
    }
}