<?php

namespace App\Http\Controllers;

use App\Models\Juri;
use Illuminate\Http\Request;
use DB;
class JuriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juris = Juri::all();

        return view('viewJuri', ['juris' => $juris]);
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
        $juris = new Juri();

        $juris->nome = $request->nome;
        $juris->email = $request->email;
        $juris->telefone = $request->telefone;
        $juris->telemovel = $request->telemovel;

        $juris->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juri  $juris
     * @return \Illuminate\Http\Response
     */
    public function show(juris $juris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juri  $juris
     * @return \Illuminate\Http\Response
     */
    public function edit(juris $juris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juri  $juris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, juris $juris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juri  $juris
     * @return \Illuminate\Http\Response
     */
    public function destroy(juris $juris)
    {
        //
    }

    public function getDisponiveis() {
        $juris = DB::table('juri')
                    ->select('juri.id_juri', 'juri.telemovel', 'juri.telefone', 'juri.nome')
                    ->where([
                        ['juri.disponivel', '=', 0]
                        ])
                    ->get();  
    
        return \json_encode($juris);
    }
}