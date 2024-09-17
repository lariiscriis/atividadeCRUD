<?php 
session_start();
require 'conexao.php';
$email = $_SESSION['login'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minha Conta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="imagem/feliz.png" type="image/svg+xml">

  <style>
  body, html {
      height: 100%;
      margin: 0;
      background-color: rgba(246, 222, 226, 0.724);
    }
    .navbar {
      box-shadow: 0px 2px 10px #FFB6C1;
    }
    #dropdownMenuButton{
        margin-right: 2em;
        color: black;
        border: none;
 }
    .container-custom {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: lightpink 0px 3px 8px;
      width: 45em;
      margin-top: 100px; 
    }
    .img-container img {
      max-width: 100%;
      border-radius: 10px;
    }
    .info-container {
      flex: 1;
    }
    hr{
      border: 1px solid lightpink;
    }
    
    .form-control:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem lightpink;
    border-color: lightpink;
}

.dropdown-menu .dropdown-item:focus, 
    .dropdown-menu .dropdown-item:hover {
    background-color: lightpink;
    color: #fff; 
}
  </style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="imagem/feliz.png" alt="" width="40" height="40" class="d-inline-block align-text-center"> Minha Conta
      </a>
      <form class="d-flex" >
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle bg-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
             <?php echo htmlspecialchars($email); ?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="minhaconta.php">Minha Conta</a></li>
            <li><a class="dropdown-item" href="cadastro.php">Minhas Inscrições</a></li>
            <li><a class="dropdown-item" href="loja.php">Loja</a></li>
          </ul>
        </div>
        <a class="btn btn-primary" type="submit" style="background-color: #FFB6C1; border: none; width: 5em;" href="logout.php">Sair</a>
      </form>
    </div>
  </nav>
<form method="POST" action="alterarS.php">
  <div class="d-flex justify-content-center align-items-center">
  <div class="container-custom">
    <div class="row">
      <div class="col-md-6 info-container" style="margin: 4em 2em 0em;">
        <h4>Redefinir Senha</h4>
            <input type="password" class="form-control" id="senha" placeholder="Senha Atual" name="senha"style="width: 16em;" ><br>
            <input type="password" class="form-control" id="novasenha" placeholder="Nova Senha" name="novasenha" style="width: 16em;"><br>
            <input type="password" class="form-control" id="confirmarnovasenha" placeholder="Confirmar Sova Senha" name="confirmarnovasenha" style="width: 16em;"><br>
  
          <hr>
        <div>
        <button type="submit" class="btn btn-primary btn-block" style="background-color: lightpink; border: none; width: 100%;">Alterar Senha</button>
        </div>
      </div>
      <div class="col-md-6 img-container">
        <img src="imagem/redefinirsenha.png" alt="Dois gatinhos">
      </div>
    </div>
  </div>
</div>
</form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

