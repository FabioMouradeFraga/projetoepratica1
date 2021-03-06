<link rel="icon" href="img/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="styles/main.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>


<script src="/js/jquery.timeago.js"></script>
<script src="/js/jquery.timeago.pt-br.js"></script>

<script>
  $( function () {
    $('.dropdown-toggle').dropdown();
  } );

  jQuery(document).ready(function() {
    jQuery("time.timeago").timeago();
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    })
  });
</script>

<?php

session_start();

include 'bd.php';

$stmt = $pdo->prepare("
  SELECT * FROM USERS
  WHERE US_ID = ?
");

$stmt->execute([$_SESSION['login']]);

$consulta = $stmt->fetchAll();

?>

<nav class="mb-1 navbar fixed-top navbar-expand-lg scrolling-navbar navbar-dark elegant-color">
  <img class="rounded-circle z-depth-0" class="rounded-circle" height="35" src="img/Logo-Forum.png">
  <a class="navbar-brand ml-1" href="/">F4All</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="documentation/proposta _projeto_e_pratica_1_forum_ifpe.pdf" target="blank">Documentação</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://github.com/FabioMouradeFraga/projetoepratica1" target="blank">GitHub</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ajuda.php">Ajuda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sobre.php">Sobre</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <div class="md-form my-0 mr-2">
        <form action="home.php" method="GET">
          <input class="form-control mr-sm-2" name="pesquisa" type="text" placeholder="Pesquisar..." aria-label="Search">
        </form>
      </div>
      <li class="nav-item avatar mt-1">
        <a class="nav-link p-0">

        <?php for ($i = 0; $i < sizeof($consulta); $i++): ?>
          <?php if($_SESSION['login'] == $consulta[$i]['US_ID']): ?>
             <?php if ($consulta[$i]['US_IMAGE'] == null || $consulta[$i]['US_IMAGE'] == 'upload/'): ?>
                      <svg width="3em" height="3em" viewBox="0 0 20 20" class="bi bi-person-circle d-block m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                      </svg>
                    <?php else: ?>
                    <img id="image-profile" src="<?= $consulta[$i]['US_IMAGE'] ?>" class="rounded-circle z-depth-0" alt="avatar image" width="38" height="38">
             <?php endif ?>

            
          <?php endif ?>

        <?php endfor ?>

        </a>
      </li>
      <li class="nav-item dropdown mt-1">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-7" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Acesso</a>

        <?php if (isset($_SESSION['login'])): ?>

          <div class="dropdown-menu dropdown-pink" aria-labelledby="navbarDropdownMenuLink-7">
            <a class="dropdown-item" href="my_profile.php?id=<?=$_SESSION['login']?>" >Perfil</a>
            <a class="dropdown-item" href="logout.php">Sair</a>
          </div>

        <?php else: ?>

          <div class="dropdown-menu dropdown-pink" aria-labelledby="navbarDropdownMenuLink-7">
            <a class="dropdown-item" href="login.php">Login</a>
            <a class="dropdown-item" href="cadastro.php">Cadastrar</a>
          </div>

        <?php endif ?>

      </li>
    </ul>
    </div>   
</nav>
