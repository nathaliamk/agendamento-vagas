<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index() {
        $veiculos = [
            'Fusca',
            'Yamaha',
            'Mercedes',
        ];

        return view ('agendamento.index', compact('veiculos'));
    }

    public function create () {
        return view ('agendamento.create');
    }
}