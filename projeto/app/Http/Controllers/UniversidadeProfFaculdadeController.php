<?php

namespace App\Http\Controllers;

use App\Models\UniversidadeProfFaculdade;
use Illuminate\Http\Request;

class UniversidadeProfFaculdadeController extends Controller
{
    public function store(Request $request)
    {
        $uniproffaculdade = new UniversidadeProfFaculdade();

        $uniproffaculdade->id_universidade = $request->id_universidade;
        $uniproffaculdade->id_professorFaculdade = $request->id_professorFaculdade;

        $uniproffaculdade->save();
    }

    public function destroy(uniproffaculdade $uniproffaculdade)
    {
        //
    }
}