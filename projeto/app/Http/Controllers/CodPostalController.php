<?php

namespace App\Http\Controllers;

use App\Models\CodPostal;
use Illuminate\Http\Request;

class CodPostalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cod_postais = CodPostal::all();

        return view('viewCodPostal', ['cod_postais' => $cod_postais]);
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
        $cod_postal = new CodPostal();

        $cod_postal->codPostal = $request->codPostal;
        $cod_postal->localidade = $request->localidade;

        $cod_postal->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CodPostal  $cod_postal
     * @return \Illuminate\Http\Response
     */
    public function show(cod_postal $cod_postal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CodPostal  $cod_postal
     * @return \Illuminate\Http\Response
     */
    public function edit(cod_postal $cod_postal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CodPostal  $cod_postal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cod_postal $cod_postal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CodPostal  $cod_postal
     * @return \Illuminate\Http\Response
     */
    public function destroy(cod_postal $cod_postal)
    {
        //
    }
}