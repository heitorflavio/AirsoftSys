<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerJogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player__jogos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('patente');
            $table->string('patente_nome');
            $table->integer('arma_propria');
            $table->foreignId('jogo_id')->constrained();
            $table->foreignId('player_id')->constrained();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player__jogos');
    }
}
