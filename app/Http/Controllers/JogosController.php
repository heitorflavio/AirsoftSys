<?php

namespace App\Http\Controllers;

use App\Models\Jogos;
use App\Models\Player_Jogos;
use App\Models\Comentario_jogo;
use App\Http\Requests\StoreJogosRequest;
use App\Http\Requests\UpdateJogosRequest;
use Illuminate\Http\Request;

class JogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // Obtém o valor da variável 'nome' na URL
        $nome = $request->input('nome');

        // Se 'nome' estiver presente, aplica o filtro
        $query = Jogos::orderBy('nome');

        if ($nome) {
            $query->where('nome', 'LIKE', '%' . $nome . '%');
        }

        $jogos = $query->paginate(10)->withQueryString();
        $players = $jogos;

        return view('consulta_jogos', ['players' => $players]);
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
     * @param  \App\Http\Requests\StoreJogosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJogosRequest $request)
    {
        //
        try {
            $validatedData = $request->validate([
                'nome' => 'required|max:255',
                'descricao' => 'required',
            ]);


            $jogo = Jogos::create([
                'nome' => $validatedData['nome'],
                'descricao' => $validatedData['descricao'],
                'status' => 1,

            ]);


            return redirect()->back()->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao processar formulário: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jogos  $jogos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jogo = Jogos::where('id', $id)->first();

        $players = Player_Jogos::where('jogo_id', $jogo->id)->where('status', 1)->paginate(10, ['*'], 'players_page');

        $player_status = Player_Jogos::where('jogo_id', $id)->where('player_id', auth()->user()->id)->where('status', 1)->first();

        $comentarios = Comentario_jogo::where('jogo_id', $id)->where('status', 1)->orderBy('created_at', 'desc')->paginate(5, ['*'], 'comments_page');

        if ($player_status) {
            $player_status = 1;
        } else {
            $player_status = 0;
        }

        // return response()->json(['players' => $players,'jogo' => $jogo,  'player_status' => $player_status]);

        #

        return view('visualizar_jogo', ['players' => $players, 'jogo' => $jogo,  'player_status' => $player_status, 'comentarios' => $comentarios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jogos  $jogos
     * @return \Illuminate\Http\Response
     */
    public function edit(Jogos $jogos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJogosRequest  $request
     * @param  \App\Models\Jogos  $jogos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJogosRequest $request, Jogos $jogos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jogos  $jogos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jogos $jogos, $id)
    {
        //
        try {
            $jogo = Jogos::where('id', $id)->first();

            if ($jogo->status == 0) {
                $jogo->status = 1;
            } else {
                $jogo->status = 0;
            }
            $jogo->save();

            return redirect()->back()->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao processar formulário: ' . $e->getMessage());
        }
    }
}
