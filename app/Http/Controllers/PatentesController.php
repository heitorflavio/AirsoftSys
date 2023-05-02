<?php

namespace App\Http\Controllers;

use App\Models\Patentes;
use App\Http\Requests\StorePatentesRequest;
use App\Http\Requests\UpdatePatentesRequest;

class PatentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePatentesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatentesRequest $request)
    {
        //

        $patente = Patentes::create([
            'nome' => $request->nome,
            'imagem' => $request->imagem
        ]);

        return response()->json('Patente cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patentes  $patentes
     * @return \Illuminate\Http\Response
     */
    public function show(Patentes $patentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patentes  $patentes
     * @return \Illuminate\Http\Response
     */
    public function edit(Patentes $patentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatentesRequest  $request
     * @param  \App\Models\Patentes  $patentes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatentesRequest $request, Patentes $patentes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patentes  $patentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patentes $patentes)
    {
        //
    }
}
