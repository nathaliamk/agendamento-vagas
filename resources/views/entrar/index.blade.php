@extends('layout')

@section('cabecalho')
    Bem-vindo
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </div>
@endif

<style>
.container2{
    border: 1px solid #ccc;
    background-color: #e9ecef;
    padding: 50px;
    border-radius: 10px;
    width: 400px;
    margin: 0 auto;
}
h3{
    text-align: center;
    padding: 10px;
}
</style>

<div class="container2">
    <form method="post">
        <h3>Acesso ao sistema</h3>
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>

        <a href="/registrar" class="btn btn-secondary mt-3">
            Registrar-se
        </a>
    </form>
</div>

@endsection
