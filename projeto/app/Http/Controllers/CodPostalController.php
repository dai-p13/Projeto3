<?php

namespace App\Http\Controllers;

use App\Models\CodPostal;
use Illuminate\Http\Request;

class CodPostalController extends Controller
{
    public function index()
    {
        $cod_postais = CodPostal::all();

        return view('viewCodPostal', ['cod_postais' => $cod_postais]);
    }

    
    public function store(Request $request)
    {
        $cod_postal = new CodPostal();

        $cod_postal->codPostal = $request->codPostal;
        $cod_postal->localidade = $request->localidade;

        $cod_postal->save();
    }

    public function update( cod_postal $cod_postal, Request $request)
    {
        $codPostal = $cod_postal;
        $localidade = $request->localidade;
    }

    public function destroy(cod_postal $cod_postal)
    {
        $codPostal = CodPostal::find($cod_postal);
        if($codPostal->codPostalRua()->first() != null){
            $codPostal->codPostalRua()->where('codPostal', $cod_postal)->delete();
        }
    }

    public function getAll() {

        $codPostal = Agrupamento::all();
        
        if($codPostal != null) {
            return  response()->json($codPostal);
        }
        else {
            return null;
        }
        
    }
}