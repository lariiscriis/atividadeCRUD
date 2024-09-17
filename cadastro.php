<?php
date_default_timezone_set('America/Sao_Paulo');
header('Content-Type: text/html; charset=utf-8');
ini_set('session.gc_maxlifetime', 900);

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['tempo_logado']) && (time() - $_SESSION['tempo_logado']) > 900) {
    echo "<script type='text/javascript'>
          alert('Sua Sessão expirou. faça login novamente!');
          window.location.href = 'index.php';
          </script>";
    session_destroy();
    exit();
}

$email = $_SESSION['login'];

// Excluir
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btnExcluir"])) {
    $arquivoExcluir = $_POST["arquivoExcluir"];
    $caminhoExcluir = "inscricoes/" . $arquivoExcluir;

    if (file_exists($caminhoExcluir)) {
        if (unlink($caminhoExcluir)) {
          echo "<script type='text/javascript'>
          alert('Incrição cancelada com sucesso!');
          window.location.href = 'cadastro.php';
          </script>";
        } }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="900">
  <title>Inscrição</title>
  <link rel="icon" href="imagem/feliz.png" type="image/svg+xml">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  </head>
  <style>
    body{
    background-color: rgba(246, 222, 226, 0.724);
}
.header {
      text-align: center;
      margin-bottom: 20px;
    }
    .headerimg {
      max-width: 100%;
      height: auto;
    }

    hr{
      border: 2px solid #FF81BC;
    }

    .form-check-input:checked{
      background-color: lightpink;
      border-color: #ed3e90;
    }
 #dropdownMenuButton{
  margin-right: 2em;
  color: black;
  border: none;
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
<body>
<nav class="navbar navbar-light bg-light" style=" box-shadow: 0px 2px 10px #FFB6C1;">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="imagem/feliz.png" alt="" width="40" height="40" class="d-inline-block align-text-center"> Área do Candidato
    </a>
    <form class="d-flex">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle bg-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"><?php echo ($email); ?></button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="minhaconta.php">Minha Conta</a></li>
        <li><a class="dropdown-item" href="cadastro.php">Minhas Incrições</a></li>
        <li><a class="dropdown-item" href="loja.php">Loja</a></li>
      </ul>
    </div>
      <a class="btn btn-primary" type="submit" style="background-color: #FFB6C1; border: none; width: 5em;;" href="logout.php">Sair</a>
    </form>
  </div>
</nav>

<div class="header">
      <img src="imagem/forms2.png" alt="Imagem Descritiva">
      <h1>Inscrição</h1>
      <p>Curso Superior em Desenvolvimento de Software Multiplataforma</p>
    </div>

<form id="formCadastro" method="post" action="#">
  <div class="container mt-4">
    <div class="row">
    <h2>Selecione um Curso</h2>
      <div class="col-9">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="curso" id="inlineRadio1" value="ADS">
                    <label class="form-check-label" for="inlineRadio1" require>ADS</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="curso" id="inlineRadio2" value="DSM">
                    <label class="form-check-label" for="inlineRadio2" require>DSM</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="curso" id="inlineRadio3" value="COMEX">
                    <label class="form-check-label" for="inlineRadio3" require>COMEX</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="curso" id="inlineRadio3" value="PQ">
                    <label class="form-check-label" for="inlineRadio3" require>PQ</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="curso" id="inlineRadio3" value="GE">
            <label class="form-check-label" for="inlineRadio3" require>GE</label>
</div>
<hr>      
 <h2>Dados Pessoais</h2>
          <div class="row mb-3">
            <div class="col">
              <label for="firstName" class="form-label" >Primeiro Nome</label>
              <input type="text" class="form-control" id="pnome" name="pnome">
            </div>
            <div class="col">
              <label for="lastName" class="form-label" >Último Nome</label>
              <input type="text" class="form-control" id="unome" name="unome">
            </div>
          </div>

          <div class="mb-3">
      <label for="validationCustomUsername">Nome de Usuário</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required name="username">
      </div>
    </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email@email.com" name="email">
          </div>
          <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="address" placeholder="Rua, número, bairro" name="endereco">
          </div>

          <div class="row mb-3">
          <div class="col">
              <label for="estado" class="form-label">Estado</label>
              <select class="form-select" id="estado" name="estado" onchange="buscarCidades()" >
                <option selected>Escolha seu Estado...</option>
                <?php
                $estados = json_decode(file_get_contents("https://servicodados.ibge.gov.br/api/v1/localidades/estados"));
                foreach ($estados as $estado) {
                    echo "<option value='{$estado->id}'>{$estado->nome}</option>";
                }
              ?>
              </select>
            </div>

            <div class="col">
              <label for="cidade" class="form-label">Cidade</label>
              <select class="form-select" id="cidade" name="cidade">
                <option selected>Escolha sua Cidade</option>
              
              </select>
            </div>

            <div class="col">
              <label for="cep" class="form-label">CEP</label>
             
              <input type="text" class="form-control" id="zip" placeholder="CEP" name="cep" required>
            </div>
          </div>

          <hr/>

          <div class="mb-3">
          <h4>Unidade</h4>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="unidade" id="unidade1" value="sede">
              <label class="form-check-label" for="unidade1">Sede</label>
            </div><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="unidade" id="unidade2" value="extensao">
              <label class="form-check-label" for="unidade2">Extensão</label>
            </div>
          </div>

          <hr/>

          <div class="mb-3">
            <h4>Período</h4>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="periodo" name="periodo[]" value="Vespertino">
              <label class="form-check-label" for="periodo1">Vespertino</label>
            </div><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="periodo" name="periodo[]" value="Noturno">
              <label class="form-check-label" for="periodo2">Noturno</label>
            </div>
          </div>

          <hr/>
          <button type="submit" class="btn btn-primary" style="background-color: lightpink; border:none;" name="cadastrar">Cadastrar</button>
        </form>
      </div>
      <?php
  if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["cadastrar"])){
    $pname = $_POST['pnome'];
    $uname = $_POST['unome'];
    $user = $_POST['username'];
    $emailp = $_POST['email'];
    $endereco = $_POST['endereco'];
    $unidade = $_POST['unidade'];
    $periodo = $_POST['periodo'];
    
     echo"
        <div class='col-3'>
        <div class='card' style='border: 2px solid lightpink; '>
          <div class='card-body'>
            <h5 class='card-title'>Resumo</h5>
            <p class='card-text'><strong>Nome: </strong>" . $pname." ". $uname. " </p>
            <hr/>
            <p class='card-text'><strong>Usuário: </strong> " .$user. "</span></p>
            <hr/>
            <p class='card-text'><strong>Email: </strong> ".$emailp." </span></p>
            <hr/>
            <p class='card-text'><strong>Endereço:</strong> ".$endereco." </span></p>
            <hr/>
            <p class='card-text'><strong>Unidade:</strong> " .$unidade."</span></p>
            <hr/>
            <p class='card-text'><strong>Período:</strong> "; foreach($periodo as $p){ echo $p . " ";} echo " </span></p>
            <hr/>
             <h5>Inscrição</h5>";

             //card de inscrição
          
          $caminho = "inscricoes/". $_POST['curso'].".txt";
          

            if(file_exists($caminho)){
              echo "<script type='text/javascript'>
              alert('Você ja esta inscrito nesse curso!');
              window.location.href = 'cadastro.php';
              </script>";
            }
            else {
              $data = date("Y-m-d H:i:s");
              $arquivo = fopen($caminho, "w");
              if($arquivo){
                fwrite($arquivo, $data . "\n");
                fclose($arquivo);
              }
            }
            $diretorio = "inscricoes/";
            $arquivos = scandir($diretorio);  
            
            foreach ($arquivos as $arquivo) {
           
                  $caminho = $diretorio . $arquivo;
          
                  if (is_file($caminho)) {
                      $ler_arquivo = fopen($caminho, "r");
                      $conteudo = fread($ler_arquivo, filesize($caminho));
                      fclose($ler_arquivo);
          
                      echo "
                      <div class='card' style='border: 2px solid lightpink;'>
                          <div class='card-header'>";echo pathinfo($arquivo, PATHINFO_FILENAME);echo"</div>
                          <div class='card-body text-dark'>
                              <p class='card-text'>$conteudo</p>
                              <form action='#' method='post'>
                                  <input type='hidden' name='arquivoExcluir' value='$arquivo'>
                                  <button type='submit' name='btnExcluir' class='btn btn-primary' style='background-color: #FFB6C1; border: none; width: 10em;'>Cancelar Inscrição</button>
                              </form>
                          </div>
                      </div><br>";
                  }
              }
          }
                
          echo "</div> ";          
}
else{
  echo" <div class='col-3'>
  <div class='card' style='border: 2px solid lightpink;max-width: 18rem; '>
    <div class='card-body'>
      <h5 class='card-title'>Resumo</h5>
      <p class='card-text'><strong>Nome:</strong></p>
      <hr/>
      <p class='card-text'><strong>Usuário:</strong></span></p>
      <hr/>
      <p class='card-text'><strong>Email:</strong> </span></p>
      <hr/>
      <p class='card-text'><strong>Endereço:</strong> </span></p>
      <hr/>
      <p class='card-text'><strong>Unidade:</strong> </span></p>
      <hr/>
      <p class='card-text'><strong>Período:</strong> </span></p>
      <hr/>
     <h5>Inscrição</h5>

    </div> 
  </div>
</div>
</div>
</div>";
} ?>



 <script>
  function buscarCidades() {
    var estadoId = document.getElementById('estado').value;
    
    if (estadoId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_cidades.php?estado=' + estadoId, true); 
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('cidade').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
}


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
