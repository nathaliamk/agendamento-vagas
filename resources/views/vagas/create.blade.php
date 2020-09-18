@extends('layout')

@section('cabecalho')
Solicitar agendamento
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>Preencha o campo</p>
                <!-- <li>{{ $error }}</li> -->
            @endforeach
    </div>
@endif
<div class="container">
  <form method="post">
      @csrf
      <div class="form-group">
          <label for="nome" class="">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome">
      </div>
      <div class="form-group">
        <label for="modelo">Modelo</label>
        <input type="text" class="form-control" name="modelo" id="modelo">
      </div>
      <div class="form-group">
        <label for="placa">Placa</label>
        <input type="text" class="form-control" name="placa" id="placa">
      </div>
      <div class="form-group">
        <label for="data">Data</label>
        <input class="form-control" type="date" name="data" id="data" >
      </div>
      <button class="btn btn-primary">Adicionar</button>
  </form>
</div>
@endsection