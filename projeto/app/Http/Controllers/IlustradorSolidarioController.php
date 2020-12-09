<?php

namespace App\Http\Controllers;

use App\Models\IlustradorSolidario;
use Illuminate\Http\Request;

class IlustradorSolidarioController extends Controller
{
    public function index()
    {
        $user = session()->get("utilizador");
        $ilustradores = IlustradorSolidario::all();
        if($user->tipoUtilizador == 0) {
            return view('admin/ilustradores', ['ilustradores' => $ilustradores]);
        }
        else {
            return view('colaborador/ilustradores', ['ilustradores' => $ilustradores]);
        }
    }

    public function create()
    {
        //
    }

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

    public function show(ilusolidario $ilusolidario)
    {
        //
    }

    public function edit(ilusolidario $ilusolidario)
    {
        //
    }

    public function update(Request $request, ilusolidario $ilusolidario)
    {
        //
    }

    public function destroy(ilusolidario $ilusolidario)
    {
        //
    }
}