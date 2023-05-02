<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login',  [App\Http\Controllers\AuthController::class, 'store']);

Route::get('/register', function () {
    return view('cadastro2');
});
Route::post('/register',  [App\Http\Controllers\PlayerController::class, 'store2']);




Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/', [App\Http\Controllers\PlayerController::class, 'home']);

    Route::get('/cadastro', [App\Http\Controllers\PlayerController::class, 'renderCadastro']);

    Route::post('/cadastro',  [App\Http\Controllers\PlayerController::class, 'store']);

    Route::get('/consulta/players',  [App\Http\Controllers\PlayerController::class, 'index']);

    Route::get('consulta/players/aniversarios', [App\Http\Controllers\PlayerController::class, 'getUsersWithBirthdayThisMonth']);

    Route::get('/consulta/player/{id}',  [App\Http\Controllers\PlayerController::class, 'show']);

    Route::post('/edita/player/{id}', [App\Http\Controllers\PlayerController::class, 'update']);

    Route::get('/consulta/usuarios',  [App\Http\Controllers\AuthController::class, 'index']);

    Route::post('/user/add/permission/{id}', [App\Http\Controllers\AuthController::class, 'addPermission']);

    Route::post('/user/remove/permission/{id}', [App\Http\Controllers\AuthController::class, 'removePermission']);

    Route::get('/logout',  [App\Http\Controllers\AuthController::class, 'destroy']);

    Route::get('/cadastro/jogos', function () {
        return view('cadastro_jogo');
    });

    Route::post('/cadastro/jogos', [App\Http\Controllers\JogosController::class, 'store']);

    Route::get('/consulta/jogos', [App\Http\Controllers\JogosController::class, 'index']);

    Route::get('/consulta/jogos/{id}', [App\Http\Controllers\JogosController::class, 'show']);

    Route::post('/player/jogos/{id}', [App\Http\Controllers\PlayerJogosController::class, 'update']);

    Route::post('/status/jogos/{id}', [App\Http\Controllers\JogosController::class, 'destroy']);

    Route::post('/comentario/jogos/{id}', [App\Http\Controllers\ComentarioJogoController::class, 'store']);
    



});

#Route::post('/imagem/patente', [App\Http\Controllers\ImagemPatentesController::class, 'store']);


