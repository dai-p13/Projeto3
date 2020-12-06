<?php

namespace App\Http\Controllers;

use App\Models\CodPostalRua;
use Illuminate\Http\Request;

class CodPostalRuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codPostalRuas = CodPostalRua::all();

        return view('viewCodPostalRua', ['codPostalRuas' => $codPostalRuas]);
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
        $codPostalRua = new CodPostalRua();

        $codPostalRua->codPostalRua = $request->codPostalRua;
        $codPostalRua->codPostal = $request->codPostal;
        $codPostalRua->rua = $request->rua;
        $codPostalRua->numPorta = $request->numPorta;

        $codPostalRua->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CodPostalRua  $codPostalRua
     * @return \Illuminate\Http\Response
     */
    public function show(codPostalRua $codPostalRua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CodPostalRua  $codPostalRua
     * @return \Illuminate\Http\Response
     */
    public function edit(codPostalRua $codPostalRua)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CodPostalRua  $codPostalRua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, codPostalRua $codPostalRua)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CodPostalRua  $codPostalRua
     * @return \Illuminate\Http\Response
     */
    public function destroy(codPostalRua $codPostalRua)
    {
        //
    }
}