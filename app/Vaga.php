<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $fillable = [
        'nome',
        'modelo',
        'placa',
        'data'
    ];

    public $timestamps = false;
}