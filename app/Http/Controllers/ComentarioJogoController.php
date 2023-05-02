<?php

namespace App\Http\Controllers;

use App\Models\Comentario_jogo;
use App\Http\Requests\StoreComentario_jogoRequest;
use App\Http\Requests\UpdateComentario_jogoRequest;

class ComentarioJogoController extends Controller
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
     * @param  \App\Http\Requests\StoreComentario_jogoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComentario_jogoRequest $request,$id)
    {
        //
        // print_r($request->all());
        // print_r($id);
        // exit;

        try{
            $comentario_jogo = Comentario_jogo::create([
                'jogo_id' => $id,
                'comentario' => $request->comentario,
                'tipo' => $request->tipo,
                'tipo_id' => $request->tipo_id,
                'status' => 1,
            
            ]);
            return redirect()->back()->with('success', 'Operação realizada com sucesso!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Erro ao processar formulário: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario_jogo  $comentario_jogo
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario_jogo $comentario_jogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario_jogo  $comentario_jogo
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario_jogo $comentario_jogo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComentario_jogoRequest  $request
     * @param  \App\Models\Comentario_jogo  $comentario_jogo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComentario_jogoRequest $request, Comentario_jogo $comentario_jogo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario_jogo  $comentario_jogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario_jogo $comentario_jogo)
    {
        //
    }
}
