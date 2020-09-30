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
     * @var array
     */
    protected $fillable = [
        'total_vagas',
        'vagas_tipo1',
        'vagas_tipo2',
        'vagas_tipo3'
    ];
}
