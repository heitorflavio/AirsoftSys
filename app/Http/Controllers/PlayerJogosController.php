<?php

namespace App\Http\Controllers;

use App\Models\Player_Jogos;
use App\Models\Jogos;
use App\Http\Requests\StorePlayer_JogosRequest;
use App\Http\Requests\UpdatePlayer_JogosRequest;
use App\Models\Player;

class PlayerJogosController extends Controller
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
     * @param  \App\Http\Requests\StorePlayer_JogosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayer_JogosRequest $request)
    {
        //

        try{
            $validatedData = $request->validate([
                'jogo_id' => 'required|integer',
                'player_id' => 'required|integer',
                'status' => 'required|integer',
            ]);


            $jogo = Player_Jogos::create([
                'jogo_id' => $validatedData['jogo_id'],
                'player_id' => $validatedData['player_id'],
                'status' => $validatedData['status'],

            ]);

 
            return redirect()->back()->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao processar formulário: ' . $e->getMessage());
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player_Jogos  $player_Jogos
     * @return \Illuminate\Http\Response
     */
    public function show(Player_Jogos $player_Jogos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player_Jogos  $player_Jogos
     * @return \Illuminate\Http\Response
     */
    public function edit(Player_Jogos $player_Jogos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlayer_JogosRequest  $request
     * @param  \App\Models\Player_Jogos  $player_Jogos
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //

       

        $player = Player_Jogos::where('jogo_id', $id)->where('player_id', auth()->user()->id)->where('status', 1)->first();
        $table_player = Player::where('user_id', auth()->user()->id)->first();

        if($player){
            $player->update(['status' => 0]);
        }else{
            $jogo = Player_Jogos::create([
                'nome' =>  $table_player->nome,
                'patente' =>  $table_player->patente,
                'patente_nome' =>  $table_player->patente_nome,
                'arma_propria'=> $table_player->arma_propria,
                'jogo_id' => $id,
                'player_id' =>auth()->user()->id,
                'status' => 1,
    
            ]);
            // $player->update(['status' => 1]);
        }

        return redirect()->back()->with('success', 'Operação realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player_Jogos  $player_Jogos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player_Jogos $player_Jogos)
    {
        //
    }
}
