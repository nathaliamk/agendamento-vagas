<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaVagas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionamento', function (Blueprint $table) {
            $table->increments('id'); // id = 1
            $table->integer('total_vagas'); // 10
            $table->integer('vagas_tipo1'); // 8
            $table->integer('vagas_tipo2'); // 2
            $table->integer('vagas_tipo3');
        });
        
        Schema::create('vagas', function (Blueprint $table) {
            $table->increments('id'); // 1
            $table->integer('estacionamento_id')->unsigned();
            $table->string('nome'); 
            $table->string('modelo');
            $table->string('placa');
            $table->integer('tipo');
            //ela foi ocupada mesmo?
            //$table->boolean('ocupada');
            $table->date('data'); //25/09/2020
        });

        Schema::table('vagas', function (Blueprint $table) {
            $table->foreign('estacionamento_id')->references('id')->on('estacionamento'); // 1
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vagas');
    }
}
