<?php

namespace App\Http\Controllers;

use App\Models\CargoProf;
use Illuminate\Http\Request;

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
}