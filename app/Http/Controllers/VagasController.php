<?php

namespace App\Http\Controllers;

use App\Vaga;
use Illuminate\Http\Request;

class VagasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        $vagas = Vaga::query()->orderBy('nome')
        ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('vagas.index', compact('vagas', 'mensagem'));
    }

    public function create()
    {
        return view('vagas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' =>  'required'
            // 'modelo' =>  'required',
            // 'placa' =>  'required'
            // 'data' =>  'required',
        ]);
        $vaga = Vaga::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Vaga agendada com sucesso"
            );

        return redirect('/vagas');
    }

    public function destroy (Request $request){
        Vaga::destroy($request->id);
        $request->session()
        ->flash(
            'mensagem',
            "Agendamento de vaga deletado com sucesso!"
        );

    return redirect('/vagas');
    }
}
