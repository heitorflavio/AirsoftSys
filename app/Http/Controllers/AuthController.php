<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Models\Auth;
use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->permission == 0) {
            return redirect('/');
        }
        // Obtém o valor da variável 'nome' na URL
        $nome = $request->input('nome');

        // Se 'nome' estiver presente, aplica o filtro
        $query = User::orderBy('name');

        if ($nome) {
            $query->where('nome', 'LIKE', '%' . $nome . '%');
        }

        $users = $query->paginate(10)->withQueryString();

        return view('usuarios', ['users' => $users]);
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
     * @param  \App\Http\Requests\StoreAuthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            // Login falhou, exibir mensagem de erro
            return redirect()->back()->withErrors(['login' => 'Credenciais inválidas, tente novamente.']);
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthRequest  $request
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthRequest $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
        Auth::logout();
        return redirect()->intended('login');
    }

    public function addPermission($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->permission = 1;
            $user->save();

            return redirect()->back()->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao processar formulário: ' . $e->getMessage());
        }
    }
    public function removePermission($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->permission = 0;
            $user->save();

            return redirect()->back()->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao processar formulário: ' . $e->getMessage());
        }
    }
}
