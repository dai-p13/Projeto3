<?php

namespace App\Http\Controllers;

use App\Models\Concelho;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class ConcelhoController extends Controller
{
    public function index()
    {
        $concelhos = Concelho::all();

        return view('viewConcelho', ['concelhos' => $concelhos]);
    }

    public function store(Request $request)
    {
        $concelho = new Concelho();

        $concelho->nome = $request->nome;

        $concelho->save();
    }

    public function update(Request $request, concelho $concelho)
    {
        //
    }

    public function destroy(concelho $concelho)
    {
        //
    }

    public function getAll()
    {
        $concelhos = Concelho::all();
        if($concelhos != null) {
            return response()->json($concelhos);
        }
        else {
            return null;
        }
    }

    public static function getNomePorId($id)
    {
        $concelho = DB::table('concelho')->where('id_concelho', $id)->first();
        if($concelho != null) {
            return $concelho->nome;
        }
        else {
            return null;
        }
    }
}