<?php
session_start();
    if (isset($_COOKIE['login'])) {
        $email = $_COOKIE['login'];

    } else {
        $email = " ";
    }



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <link rel="icon" href="imagem/feliz.png" type="image/svg+xml">
    <title>Login</title>
   <style>
    .form-check-input:checked{
      background-color: lightpink;
      border-color: #ed3e90;
    }
    hr{
      border: 1px solid lightpink;
    }

    body{
    background-color: rgba(246, 222, 226, 0.724);
}

.form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .form-content {
            max-width: 900px;
            margin-right: 30px;
        }
        .form-control:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem lightpink;
    border-color: lightpink;
}

.fundo{
        width: 30em;
        background-color: white;
        padding: 4em;
        border-radius: 3em;
        box-shadow: lightpink 0px 3px 8px;
      }
   </style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
<div class="fundo">
<div class="form-content">
<div class="text-center mb-4">
            <img src="imagem/feliz.png" alt="" class="mb-3">
            <h1>Área Restrita</h1>
        </div>
<form action="login.php" method="post" style="width: 100%; max-width: 400px; color: black;" class="justify-content-center align-items-center">
<div class="">
  <div class="form-group my-4">
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
  </div>
  <div class="form-group  my-4">
    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha"><br>
    <label>
            <input type="checkbox" name="remember" value="1" class="form-check-input"> Lembre-me
    </label>
  </div>
  <button type="submit" class="btn btn-primary" style="background-color: lightpink; border: none; width: 10em;" >Enviar</button><br><hr>
  <a>Não tem cadastro? <a href="cadastroAluno.php" style="color: #FF81BC">Cadastre-se</a></a>
</div>
 </div>
    </div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
