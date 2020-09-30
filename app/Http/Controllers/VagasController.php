<?php

namespace App\Http\Controllers;

use App\Vaga;
use App\Estacionamento;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VagasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) 
    {
        $vagas = Vaga::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');
        
        //Consulta para pegar todas as vagas agendadas em um determinado dia
        $vagas_reservadas_no_dia = count($this->consultaVagasReservadas($request));

        //descer...
        //isso aqui vai virar  um loop para pegar todos os possiveis estacionamentos. exemplo: estacionamento lateral,
        //estacionamento principal, etc
        $todas_vagas_agendadas = Vaga::where('estacionamento_id', 1)->get();
        $placas = [];

        //adicionando as placas dos agendamentos em um vetor para mostrar no frontend
        // foreach($vagas_reservadas_no_dia as $agendamentos) {
        //     array_push($placas, $agendamentos->placa);
        // }

        //pega as informações do Estacionamento
        //TODO: extrair para um método privado auxiliar
        $estacionamentos = Estacionamento::first();
        // Verificar se existe estacionameto para que nao haja problemas ao realizar as chamas da view
        if($estacionamentos == null){
            //TODO: Colocar um view funcional
            return view('/'); 
        }
        
        $vagas_estacionamento = $estacionamentos->total_vagas;
        $vagas_carros = $estacionamentos->vagas_tipo1;
        $vagas_motos = $estacionamentos->vagas_tipo2;

        $vagas_disponiveis = $vagas_estacionamento - $vagas_reservadas_no_dia;
        $vagas_reservadas = $vagas_reservadas_no_dia;

        //fazer essa pesquisa em loop, prreenchendo as datas futuras de uma semana pra frente
        //um dia de cada vez, colocando tudo num vetor e retornando para o porteiro
        //pode visualizar os agendamentos 

        return view('vagas.index', compact('vagas', 'mensagem', 'vagas_reservadas', "vagas_disponiveis", "vagas_carros", "vagas_motos"));
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
            // Pode colocar o estacionamento ID aqui como requerido, porem tem que vir junto com o formulario
            'nome' =>  'required',
            'modelo' =>  'required',
            'placa' =>  'required',
            'data' =>  'required'
        ]);

        // TODO: Verificar item abaixo (Fazer que o ID venha pelo request ou uma procura e adicionar aos valores que irão para o banco e sempre verificar se ele é existente)
        $request['estacionamento_id'] = 1;

        // dd($request->all());
        
        //TODO
        //se o usuário entrar com uma data...
        
        // if($request->data) {
        //     //parse com o carbon
        //     //tipo isso aqui...
        //     $request->data = Carbon::parse($request->data);

        //     $vagas_agendadas = Vaga::where('data', $request->data);
        //     $estacionamento = Estacionamento::first();
            
        //     if(count($vagas_agendadas) >= $estacionamento->total_vagas){
        //         //não  lembro se a sintaxe é essa...
        //         return redirect('/erro', compact('mensagem', 'Todas as vagas para este dia estão ocupadas!'));
        //     } 

        //     if(count($vagas_agendadas->vaga_tipo1) >= $estacionamento->vagas_tipo1) {
        //         return redirect('/erro', compact('mensagem', 'Todas as vagas de carro para este dia estão ocupadas!'));
        //     }

        //     if(count($vagas_agendadas->vaga_tipo2) >= $estacionamento->vagas_tipo2) {
        //         return redirect('/erro', compact('mensagem', 'Todas as vagas de moto  para este dia estão ocupadas!'));
        //     }
        // }

        // TODO: verificar se array_key_exists esta em uso ou se ficou depreciado
        if(!isset($request['estacionamento_id'])){
            // redirecionamento para pagina de erros
        }
        $vaga = Vaga::create($request->all());
        
        $request->session()
            ->flash(
                'mensagem',
                "Agendamento feito com sucesso!"
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
