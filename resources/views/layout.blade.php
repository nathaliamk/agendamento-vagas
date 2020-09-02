<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Agendamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Olá, Usuário
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Editar usuário</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Sair</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
            <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
                <div class="collapse navbar-collapse ">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href="#"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Teste</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="/agendamento/"><i class="fa fa-book fa-fw"></i> <span class="d-none d-md-inline">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="/agendamento/login"><i class="fa fa-cog fa-fw"></i> <span class="d-none d-md-inline">Login</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="/agendamento/agendar"><i class="fa fa-heart codeply fa-fw"></i> <span class="d-none d-md-inline">Agendar</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="/agendamento/usuarios"><i class="fa fa-star codeply fa-fw"></i> <span class="d-none d-md-inline">Usuários</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="#"><i class="fa fa-star fa-fw"></i> <span class="d-none d-md-inline">Link</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <main class="col bg-faded py-3 flex-grow-1">
          <div class="jumbotron">
            <h1>@yield('cabecalho')</h1>
        </div>

        @yield('conteudo')
    </div>
</body>
</html>