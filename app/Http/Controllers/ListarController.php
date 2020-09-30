<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListarController extends Controller
{
    public function listar () {
        return view ('vagas.listar');
    }
}