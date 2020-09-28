@extends('layout')

@section('cabecalho')
    Entrar
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
    width: 50%;
    margin: 0 auto;
}
</style>

<div class="container2">
    <form method="post">
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
