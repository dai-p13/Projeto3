<?php

namespace App\Http\Controllers;

use App\Models\RBE;
use Illuminate\Http\Request;

class RBEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rbe = RBE::all();

        return view('viewrbe', ['rbe' => $rbe]);
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
        $rbe = new RBE();

        $rbe->regiao = $request->regiao;
        $rbe->nomeCoordenadore = $request->nomeCoordenadore;
        $rbe->id_concelho = $request->id_concelho;

        $rbe->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RBE  $rbe
     * @return \Illuminate\Http\Response
     */
    public function show(rbe $rbe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RBE  $rbe
     * @return \Illuminate\Http\Response
     */
    public function edit(rbe $rbe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RBE  $rbe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rbe $rbe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RBE  $rbe
     * @return \Illuminate\Http\Response
     */
    public function destroy(rbe $rbe)
    {
        //
    }
}