



<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" href="imagem/feliz.png" type="image/svg+xml">
<style>
.form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
        }

        .form-content {
            max-width: 900px;
            margin-right: 30px;
        }

        body{
    background-color: rgba(246, 222, 226, 0.724);
}

      .fundo{
        width: 30em;
        background-color: white;
        padding: 2em;
        border-radius: 3em;
        box-shadow: lightpink 0px 3px 8px;
      }
      hr{
      border: 1px solid lightpink;
    }

    img{ 
      width: 5em;
    }

    .form-control:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem lightpink;
    border-color: lightpink;
}

    </style>
    </head>
    <body>
      <div class="container form-container">
        <div class="form-content">
        <form action="insert.php" method="POST">
        <div class="fundo">
        <div class="text-center mb-4">
        <h2 class="text-center mb-4">Cadastro</h2>

            <img src="imagem/feliz.png" alt="" class="mb-3">
        </div>
          <div class="form-group my-2">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" name="nome"required>
          </div>
            <div class="form-group my-2">
              <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" placeholder="Digite seu CPF" name="cpf"required>
          </div>
            <div class="form-group my-2">
              <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" name="email"required>
          </div>
            <div class="form-group my-2">
              <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha" required></div>
            <div class="form-group my-2">
              <label for="confirmar-senha">Confirmar Senha</label>
            <input type="password" class="form-control" id="confirmar-senha" placeholder="Confirme sua senha" name="confirmarsenha"required>
          </div>
          <hr>
            <button type="submit" class="btn btn-primary btn-block" style="background-color: lightpink; border: none;">Cadastrar</button>
            <div class="text-center mt-3">
              <a>Já tem uma conta? </a><a href="index.php" style="color: #FF81BC">Faça login</a>
          </div>
          </div>

          </form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script><script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></body></html>
