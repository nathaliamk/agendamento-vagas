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
                    <h2 class="text-right"><i class="fa fa-motorcycle f-left"></i><span>{{ $vagas_motos }}</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card btn btn-dark mb-2">
                <div class="card-block">
                    <h6 class="m-b-20">Vagas para Carros</h6>
                    <h2 class="text-right"><i class="fa fa-car f-left"></i><span>{{ $vagas_carros }}</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card btn btn-dark mb-2">
                <div class="card-block">
                    <h6 class="m-b-20">Vagas Ocupadas</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span> {{ $vagas_reservadas }} </span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card btn btn-dark mb-2">
                <div class="card-block">
                    <h6 class="m-b-20">Vagas Disponíveis</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span> {{ $vagas_disponiveis }} </span></h2>
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

<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th scope="col">Nome</th>
                <th scope="col">Modelo</th>
                <th scope="col">Placa</th>
                <th scope="col">Data</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th>#</th>
                <th scope="col">Nome</th>
                <th scope="col">Modelo</th>
                <th scope="col">Placa</th>
                <th scope="col">Data</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </tfoot>
        @foreach($vagas as $vaga)
        <tbody>
            <tr>
            <th scope="row">{{ $vaga->id }}</th>
            <td>{{ $vaga->nome }}</td>
            <td>{{ $vaga->modelo }}</td>
            <td>{{ $vaga->placa }}</td>
            <td>{{ date( 'd/m/Y' , strtotime($vaga->data))}}</td>
            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="fa fa-pencil" aria-hidden="true"></i></button></p></td>
            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fa fa-trash-o" aria-hidden="true"></i></button></p></td>
            </tr>
        </tbody>
        @endforeach
        </table>
    	</div>
	</div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title custom_align" id="Heading">Edite seu item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Nome">
                </div>
            <div class="form-group">
                <input class="form-control " type="text" placeholder="Modelo">
            </div>
            <div class="form-group">
                <input class="form-control " type="text" placeholder="Placa">
            </div>
            <div class="form-group">
                <input class="form-control " type="date" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Atualizar</button>
        </div>
    </div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <h4 class="modal-title custom_align" id="Heading">Excluir item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>Tem certeza que deseja remover?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Sim</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Não</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
</body>

<!-- <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Modelo</th>
        <th scope="col">Placa</th>
        <th scope="col">Data</th>
        <th scope="col">Carro</th>
        <th scope="col">Moto</th>
        <th scope="col">Preferencial</th>
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
            <td><input type="checkbox" name="vagas_tipo1"></td>
            <td><input type="checkbox" name="vagas_tipo2"></td>
            <td><input type="checkbox" name="vagas_tipo3"></td>
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
    </table> -->
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

<script>
$(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

</script>