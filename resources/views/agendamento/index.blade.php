@extends('layout')

@section('cabecalho')
Controle de Agendamento
@endsection

@section('conteudo')
<a href="/agendamento/agendar" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    <?php foreach ($veiculos as $veiculo): ?>
        <li class="list-group-item"><?= $veiculo; ?></li>
    <?php endforeach; ?>
</ul>
@endsection