<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="/css/formulario-produto.css">
    <link type="text/css" rel="stylesheet" href="/css/login-cadastro.css">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
       <title>Listagem de Produtos</title>
  </head>
   <body>
   <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light row">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
      <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link active" href="/produtos/novo">Cadastrar</a>
      </li>
      <li class="nav-item">
         <a class="nav-link active" href="/produtos">Listar</a>
      </li>
      </ul>
      </div>
      </nav>
      @yield('conteudo')
      <section>
       <footer class="rodape">
           <p class="text-center col-12"><b>Copyright © 2019 Todos os direitos reservado</b></p>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
           <script src="../js/jquery-2.1.1-jquery.min.js"></script>
           <script src="../js/jquery.mask.min.js"></script>
           <script src="../js/mascara.js"></script>
         </footer>
      </section>
   </div>
   </body>
</html>