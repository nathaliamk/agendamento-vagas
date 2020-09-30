<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamento extends Model
{
    /**
     * @var string
     */
    protected $table = "estacionamento";


    /**
     * Verificar se a ao chamar a model as informações estão vindo correta
     * @var array
     */
    protected $fillable = [
        'total_vagas',
        'vagas_tipo1',
        'vagas_tipo2',
        'vagas_tipo3'
    ];

}
