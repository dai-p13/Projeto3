<?php

namespace App\Http\Controllers;

use App\Models\Agrupamento;
use Illuminate\Http\Request;

class AgrupamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session()->get("utilizador");
        $agrupamentos = Agrupamento::all();
        if($user->tipoUtilizador == 0) {
            return view('admin/agrupamentos', ['data' => $agrupamentos]);
        }
        else {
            return view('colaborador/agrupamentos', ['data' => $agrupamentos]);
        }
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
        $agrupamento = new Agrupamento();

        $agrupamento->nome = $request->nome;
        $agrupamento->telefone = $request->telefone;
        $agrupamento->email = $request->email;
        $agrupamento->nomeDiretor = $request->nomeDiretor;

        $agrupamento->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agrupamento  $agrupamento
     * @return \Illuminate\Http\Response
     */
    public function show(agrupamento $agrupamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agrupamento  $agrupamento
     * @return \Illuminate\Http\Response
     */
    public function edit(agrupamento $agrupamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agrupamento  $agrupamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agrupamento $agrupamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agrupamento  $agrupamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(agrupamento $agrupamento)
    {
        //
    }
}