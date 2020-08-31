@extends('layout')

@section('cabecalho')
Agendar Veículo
@endsection

@section('conteudo')
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
        </form>
        <button class="btn btn-primary">Adicionar</button>
@endsection