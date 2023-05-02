<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        // Obtém o valor da variável 'nome' na URL
        $nome = $request->input('nome');

        // Se 'nome' estiver presente, aplica o filtro
        $query = Player::orderBy('nome');

        if ($nome) {
            $query->where('nome', 'LIKE', '%' . $nome . '%');
        }

        $players = $query->paginate(10)->withQueryString();

        return view('players', ['players' => $players]);
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
     * @param  \App\Http\Requests\StorePlayerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request)
    {
      
        try {
            $validatedData = $request->validate([
                'nome' => 'required|max:255',
                'email' => 'required|unique:players|max:255',
                'telefone' => 'required|max:20',
                'cpf' => 'required|max:20',
                'telefone2' => 'required|max:20',
                'data' => 'required|date',
                'sangue' => 'required',
                'end' => 'required|max:255',
                'num' => 'required|max:10',
                'med' => 'required|max:255',
                'bairro' => 'required|max:255',
                'cep' => 'required|max:20',
                'alergia' => 'required|max:255',
                'cidade' => 'required|max:255',
                'patente' => 'required',
                'Password' => 'required|max:255',
                'arma' => 'required',
            ]);
           

            $patente = DB::table('patentes')->where('id', $validatedData['patente'])->first();

            $user = User::create([
                'name' => $validatedData['nome'],
                'email' => $validatedData['email'],
                'email_verified_at' => null,
                'password' => bcrypt($validatedData['Password']),
                'permission' => 0,
                'remember_token' => null,
                'patente' => $patente->imagem,

            ]);

           


            $cadastro = Player::create([
                'nome' => $validatedData['nome'],
                'user_id' => $user->id,
                'email' => $validatedData['email'],
                'telefone' => $validatedData['telefone'],
                'cpf' => $validatedData['cpf'],
                'telefone2' => $validatedData['telefone2'],
                'data' => $validatedData['data'],
                'sangue' => $validatedData['sangue'],
                'endereco' => $validatedData['end'],
                'numero' => $validatedData['num'],
                'remedio' => $validatedData['med'],
                'bairro' => $validatedData['bairro'],
                'cep' => $validatedData['cep'],
                'alergia' => $validatedData['alergia'],
                'cidade' => $validatedData['cidade'],
                'patente' => $patente->imagem,
                'patente_nome' => $patente->nome,
                'arma_propria' => $validatedData['arma'],
                'senha' => bcrypt($validatedData['Password']),
            ]);




            return redirect()->back()->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            // return redirect()->back()->with('error', 'Erro ao processar formulário: ' . $e->getMessage());
            return response()->json('error', 'Erro ao processar formulário: ' . $e->getMessage());
        }
    }

    public function getUsersWithBirthdayThisMonth()
    {
        $players = Player::whereMonth('data', '=', date('m'))->orderBy('data')->get();
        return view('aniversarios', ['players' => $players]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $player = Player::where('id', $id)->first();
        
        
        $patentes = DB::table('patentes')->get();


        return view('player_edita', ['player' => $player, 'patentes' => $patentes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlayerRequest  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        if (auth()->user()->permission == 0) {
            return redirect('/');
        }
        try {

            $player = Player::where('id', $id)->first();

           

            $validatedData = $request->validate([
                'nome' => 'required|max:255',
                #'email' => 'required|max:255',
                'telefone' => 'required',
                'cpf' => 'required|max:20',
                'telefone2' => 'required',
                'data' => 'required',
                'sangue' => 'required',
                'end' => 'required|max:255',
                'num' => 'required|max:10',
                'med' => 'required|max:255',
                'bairro' => 'required|max:255',
                'cep' => 'required|max:20',
                'alergia' => 'required|max:255',
                'cidade' => 'required|max:255',
                'patente' => 'required',
                'arma' => 'required'
            ]);

            
        
            $patente = DB::table('patentes')->where('id',$validatedData['patente'])->first();
            

            $player->nome = $validatedData['nome'];
            $player->telefone = $validatedData['telefone'];
            $player->cpf = $validatedData['cpf'];
            $player->telefone2 = $validatedData['telefone2'];
            $player->data = $validatedData['data'];
            $player->sangue = $validatedData['sangue'];
            $player->endereco = $validatedData['end'];
            $player->numero = $validatedData['num'];
            $player->remedio = $validatedData['med'];
            $player->bairro = $validatedData['bairro'];
            $player->cep = $validatedData['cep'];
            $player->alergia = $validatedData['alergia'];
            $player->cidade = $validatedData['cidade'];
            $player->patente = $patente->imagem;
            $player->patente_nome = $patente->nome;
            $player->arma_propria = $validatedData['arma'];

            $player->save();


            $user = User::find($player->user_id);

            $user->patente = $patente->imagem;
            $user->save();

            return redirect()->back()->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao processar formulário: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }

    public function renderCadastro()
    {
        $patentes = DB::table('patentes')->get();

        return view('cadastro', ['patentes' => $patentes]);
    }

    public function store2(StorePlayerRequest $request)
    {
        try {
            $validatedData = $request->validate([
                'nome' => 'required|max:255',
                'email' => 'required|unique:players|max:255',
                'telefone' => 'required|max:20',
                'cpf' => 'required|max:20',
                'telefone2' => 'required|max:20',
                'data' => 'required|date',
                'sangue' => 'required',
                'end' => 'required|max:255',
                'num' => 'required|max:10',
                'med' => 'required|max:255',
                'bairro' => 'required|max:255',
                'cep' => 'required|max:20',
                'alergia' => 'required|max:255',
                'cidade' => 'required|max:255',
                'Password' => 'required|max:255',
                'arma' => 'required'
            ]);
          

            $patente = DB::table('patentes')->where('id', 1)->first();

            $user = User::create([
                'name' => $validatedData['nome'],
                'email' => $validatedData['email'],
                'email_verified_at' => null,
                'password' => bcrypt($validatedData['Password']),
                'permission' => 0,
                'remember_token' => null,
                'patente' => $patente->imagem,

            ]);


            $cadastro = Player::create([
                'nome' => $validatedData['nome'],
                'user_id' => $user->id,
                'email' => $validatedData['email'],
                'telefone' => $validatedData['telefone'],
                'cpf' => $validatedData['cpf'],
                'telefone2' => $validatedData['telefone2'],
                'data' => $validatedData['data'],
                'sangue' => $validatedData['sangue'],
                'endereco' => $validatedData['end'],
                'numero' => $validatedData['num'],
                'remedio' => $validatedData['med'],
                'bairro' => $validatedData['bairro'],
                'cep' => $validatedData['cep'],
                'alergia' => $validatedData['alergia'],
                'cidade' => $validatedData['cidade'],
                'patente' => $patente->imagem,
                'patente_nome' => $patente->nome,
                'arma_proria' => $validatedData['arma'],
                'senha' => bcrypt($validatedData['Password']),
            ]);




            return redirect()->back()->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao processar formulário: ' . $e->getMessage());
        }
    }

    public function home()
    {

        $players = DB::table('players')->get();
        $players = count($players);
        return view('home', ['players' => $players]);
    }
    
}
