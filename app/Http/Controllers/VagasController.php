<?php

namespace App\Http\Controllers;

use App\Vaga;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        
        //Consulta para pegar todas as vagas agendadas em um determinado dia
        $vagas_reservadas = count($this->consultaVagasReservadas($request));
        
        //Esse numero 50 será substituido pelo total de vagas disponivel no estacionamento
        $vagas_disponiveis = 50 - $vagas_reservadas;
        // criar  uma nova tabela, para o estacionamento. Esta tabela terá:
        // total de vagas, vagas_tipo1, vagas_tipo2, vagas_tipo3

        return view('vagas.index', compact('vagas', 'mensagem', 'vagas_reservadas', "vagas_disponiveis"));
    }

    private function consultaVagasReservadas($request) {
        // se não tiver data definida, define a data como agora. caso tenha data definida, torna-a uma instância
        // do carbon
        if($request->data == null) {
            $request->data = Carbon::now();
        } else {
            $request->data = Carbon::parse($request->data);
        }

        // método pluck retorna todas as linhas de uma determinada coluna que coincidir com 
        // um determinado critério
        return Vaga::where('data',$request->data->toDateString())->pluck('placa','modelo');
    }

    public function create()
    {
        return view('vagas.create');
    }

    //grava um agendamento, não uma vaga!
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
