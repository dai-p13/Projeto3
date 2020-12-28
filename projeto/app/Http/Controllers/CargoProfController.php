<?php

namespace App\Http\Controllers;

use App\Models\CargoProf;
use Illuminate\Http\Request;
use DB;

class CargoProfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = CargoProf::all();

        return view('viewCargoProf', ['cargos' => $cargos]);
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
        $cargo = new CargoProf();

        $cargo->nomeCargo = $request->nomeCargo;

        $cargo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CargoProf  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CargoProf  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(cargo $cargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CargoProf  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cargo $cargo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CargoProf  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(cargo $cargo)
    {
        //
    }

    public function getAll() {
        $cargos = CargoProf::all();
        
        if($cargos != null) {
            return \json_encode($cargos);  
        }
        else {
            return null;
        } 
    }

    public function getPorIdProf($id, $id_projeto, $ano) {
        $cargo =  DB::table('cargo_professor')
                ->join('projeto_professor', 'cargo_professor.id_cargoProfessor', '=', 'projeto_professor.id_cargo')
                ->select('cargo_professor.nomeCargo' , 'cargo_professor.id_cargoProfessor')
                ->where([
                    ['projeto_professor.id_professor', '=', $id],
                    ['projeto_professor.id_projeto', '=', $id_projeto],
                    ['projeto_professor.anoParticipacao', '=', $ano]
                    ])
                ->first();
        
        if($cargo != null) {
            return \json_encode($cargo);  
        }
        else {
            return null;
        } 
    }
}