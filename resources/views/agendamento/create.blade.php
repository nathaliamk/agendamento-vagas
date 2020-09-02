@extends('layout')

@section('cabecalho')
Agendar Veículo
@endsection

@section('conteudo')
<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Nome completo</label>
    <input type="text" class="form-control" id="formGroupExampleInput">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="tipo-veiculo">Tipo de veículo</label>
      <select id="tipo-veiculo" class="form-control">
        <option selected>Escolha</option>
        <option>Carro</option>
        <option>Moto</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" id="modelo">
    </div>
    <div class="form-group col-md-2">
      <label for="placa">Placa</label>
      <input type="text" class="form-control" id="placa">
    </div>
  </div>
  <div class="form-group">
    <label for="nome">Data</label>
    <input class="form-control" type="date">
  </div>
  <div class="mb-3">
    <label for="validationTextarea">Descrição</label>
    <textarea class="form-control" id="validationTextarea" placeholder="Descreva o motivo do agendamento." required></textarea>
  </div>
</form>
<button class="btn btn-primary">Adicionar</button> 
        <!-- <form method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
                <label for="nome">Placa</label>
                <input type="text" class="form-control" name="placa" id="placa">
                <label for="nome">Modelo</label>
                <input type="text" class="form-control" name="modelo" id="modelo">
                <label for="nome">Data</label>
                <input class="form-control" type="date">
            </div>
        </form>
@endsection