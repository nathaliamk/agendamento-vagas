<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    /**
     * Adiconar a chave entrangeira para realizar a inserção no banco
     * Chave estangeira estacionamento_id
     * @var array
     */
    protected $fillable = [
        'nome',
        'estacionamento_id',
        'modelo',
        'placa',
        'data'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    public function estacionamento() 
    {
        return $this->belongsTo('App\Estacionamento', 'estacionamento_id');
        // verificar se é esse o relacionamento adequado
        // https://laravel.com/docs/5.8/eloquent-relationships    
    } 

    // php artisan make:model Estacionamento
    // ... vai criar uma outra classe Model, chamada Estacionamento 
}