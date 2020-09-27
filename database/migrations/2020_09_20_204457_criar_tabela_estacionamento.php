<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaEstacionamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('estacionamento', function (Blueprint $table) {
        //     $table->increments('id'); // id = 1
        //     $table->integer('total_vagas'); // 10
        //     $table->integer('vagas_tipo1'); // 8
        //     $table->integer('vagas_tipo2'); // 2
        //     $table->integer('vagas_tipo3');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estacionamento');
    }
}
