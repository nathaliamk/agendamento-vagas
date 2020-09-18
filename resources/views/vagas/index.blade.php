@extends('layout')

@section('cabecalho')
Agendamento de vagas
@endsection

@section('conteudo')

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
body{
    margin-top:20px;
    background:#FAFAFA;
}
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
  </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card btn btn-dark mb-2">
                <div class="card-block">
                    <h6 class="m-b-20">Vagas para Motos</h6>
                    <h2 class="text-right"><i class="fa fa-motorcycle f-left"></i><span>0</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card btn btn-dark mb-2">
                <div class="card-block">
                    <h6 class="m-b-20">Vagas para Carros</h6>
                    <h2 class="text-right"><i class="fa fa-car f-left"></i><span>0</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card btn btn-dark mb-2">
                <div class="card-block">
                    <h6 class="m-b-20">Vagas Ocupadas</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>0</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card btn btn-dark mb-2">
                <div class="card-block">
                    <h6 class="m-b-20">Vagas Disponíveis</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>0</span></h2>
                </div>
            </div>
        </div>
	</div>
</div>

<div class="container">
@if(!empty($mensagem))
    <div class="alert alert-success" role="alert">
        {{$mensagem}}
    </div>
@endif
<a href="/vagas/criar" class="btn btn-dark mb-2">Adicionar</a>
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Modelo</th>
        <th scope="col">Placa</th>
        <th scope="col">Data</th>
        <th scope="col" colspan="2">Ações</th>
        </tr>
    </thead>
    @foreach($vagas as $vaga)
    <tbody>
        <tr>
            <th scope="row">{{ $vaga->id }}</th>
            <td>{{ $vaga->nome }}</td>
            <td>{{ $vaga->modelo }}</td>
            <td>{{ $vaga->placa }}</td>
            <td>{{ date( 'd/m/Y' , strtotime($vaga->data))}}</td>
            <td>
            <form method="post" action="/vagas/{{ $vaga->id }}"
                onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($vaga->nome) }}?')">
                <button class="btn btn-info btn-sm">Editar</button>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>
            </td>
        </tr>
    </tbody>
    @endforeach
    </table>
</div>

<!-- <ul class="list-group">
    @foreach($vagas as $vaga)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $vaga->nome }}
        <form method="post" action="/vagas/{{ $vaga->id }}"
              onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($vaga->nome) }}?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </li>
    @endforeach
</ul> -->
</body>
</html>
@endsection