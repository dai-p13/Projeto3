<?php

namespace App\Http\Controllers;

use App\Models\ProjetoEntidade;
use Illuminate\Http\Request;

class ProjetoEntidadeController extends Controller
{
    public function index()
    {
        $projentidade = ProjetoEntidade::all();

        return view('viewProjetoEntidade', ['projentidade' => $projentidade]);
    }

    public function store(Request $request)
    {
        $projentidade = new ProjetoEntidade();

        $projentidade->id_projeto = $request->id_projeto;
        $projentidade->id_entidadeOficial = $request->id_entidadeOficial;
        $projentidade->anoParticipacao = $request->anoParticipacao;

        $projentidade->save();
    }

    public function show(projentidade $projentidade)
    {
        //
    }

    public function edit(projentidade $projentidade)
    {
        //
    }

    public function update(Request $request, projentidade $projentidade)
    {
        //
    }

    public function destroy(projentidade $projentidade)
    {
        //
    }
}