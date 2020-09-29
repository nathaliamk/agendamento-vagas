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
    
  <style>
    html,
body {
    overflow-x: hidden;
}
body {
    padding-top: 56px;
}
.offcanvas-collapse {
    position: fixed;
    top: 56px;
    bottom: 0;
    right: 100%;
    left: -300px;
    width: 300px;
    padding-right: 1rem;
    padding-left: 1rem;
    overflow-y: auto;
    visibility: hidden;
    background-color: /*#343a40*//*#f8f9fa*/#155592;
    transition-timing-function: ease-in-out;
    transition-duration: .3s;
    transition-property: left, visibility;
}

.offcanvas-collapse {
    align-items: start;
    -moz-background-clip: padding;
    -webkit-background-clip: padding;
    background-clip: padding-box;
    border-right: 5px solid rgba(0, 0, 0, 0.2);

}

.offcanvas-collapse.open {
    left: 0;
    visibility: visible;
}

.navbar-expand-lg .navbar-nav {
    -ms-flex-direction: column;
    flex-direction: column;
}

.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}
.nav-scroller .nav {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    color: rgba(255, 255, 255, .75);
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}

.nav-underline .nav-link {
    padding-top: .75rem;
    padding-bottom: .75rem;
    font-size: .875rem;
    color: #6c757d;
}

.nav-underline .nav-link:hover {
    color: #007bff;
}

.nav-underline .active {
    font-weight: 500;
    color: #343a40;
}
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top shadow navbar-dark navbar-offcanvas d-flex justify-content-between" style="background-color: #155592;">

    <button class="navbar-toggler d-block" type="button" id="navToggle">
        <span class="navbar-toggler-icon"><a class="navbar-brand mr-auto" href="#"></a></span>
    </button>
    <a href="/sair" class="text-light">Sair</a>

    <div class="navbar-collapse offcanvas-collapse ">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/vagas">Início <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Notificações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Calendário</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Perfil</a>
            </li>
            
        </ul>
    </div>

    <!-- <div class="btn-group">
        <button type="button bt-sair" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Olá, Usuário!
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Sair</a>
        </div>
    </div> -->
</nav>
<div class="container">
  </div>
      <main class="col bg-faded py-3 flex-grow-1">
        <div class="jumbotron">
          <h1>@yield('cabecalho')</h1>
      </div>

      @yield('conteudo')
  </div>
</div>

  </script>

  <script>
    $(document).ready(function () {
      console.log("document is ready");
      $('[data-toggle="offcanvas"], #navToggle').on('click', function () {
          $('.offcanvas-collapse').toggleClass('open')
      })
    });
    window.onload = function () {
        console.log("window is loaded");
    };  
  </script>
</body>
</html>