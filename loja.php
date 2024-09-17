<?php  
session_start();
require 'conexao.php'; 

$email = $_SESSION['login'];
$url = "https://fakestoreapi.com/products/category/electronics";
$info = file_get_contents($url);

if ($info === FALSE) {
    echo 'Erro ao obter dados da API.';
    exit;
}

$dados = json_decode($info, true);

if ($dados === NULL) {
    echo 'Erro ao decodificar o JSON.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="imagem/feliz.png" type="image/svg+xml">
    <title>Loja</title>
    <style>
            body{
    background-color: rgba(246, 222, 226, 0.724);
}
        #dropdownMenuButton {
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

        .card {
            border: 2px solid lightpink;
            border-radius: 0.5rem;
            overflow: hidden;
            transition: transform 0.2s ease-in-out;
            height: 100%;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: lightpink 0px 3px 8px;
        }

        .card-img-top {
            height: 200px; 
            width: auto; 
            display: block;
            margin-left: auto;
            margin-top: 1em;
            margin-right: auto;
            object-fit: contain; 

        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 10px;
            pointer-events: none;
        }

        .offer-text {
            background: lightpink;
            color: #fff;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 0.9em;
        }

        .discount-icon {
            background: lightpink;
            color: #fff;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .card-body {
            padding: 1.25rem;
        }

        .description {
            max-height: 4.8em; 
            overflow: hidden;
            text-overflow: ellipsis;
            position: relative;
            transition: max-height 0.3s ease;
        }

        .description.expanded {
            max-height: none;
        }

        .read-more {
            color: lightpink;
            cursor: pointer;
            display: inline-block;
            margin-top: 0.5em;
            font-size: 0.9em;
        }

        .rating-container {
            display: flex;
            align-items: center;
            gap: 5px;
            color: lightpink;
            margin-top: -2.5em;
            margin-left: 15em;
        }

        .rating-container .filled {
            color: lightpink;
        }

        .rating-container .half {
            color: lightpink;
        }

        .rating-container .empty {
            color: #ddd; 
        }

        .rating-container i {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="imagem/feliz.png" alt="" width="40" height="40" class="d-inline-block align-text-center"> Minha Conta
        </a>
        <form class="d-flex">
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

<div class="container mt-5">
    <div class="row">
        <?php
        foreach($dados as $dado) {
            $rating = $dado['rating']['rate'];
            $fullStars = floor($rating);
            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
            $emptyStars = 5 - $fullStars - $halfStar;

            echo "<div class='col-md-4 mb-4'>
                <div class='card'>
                    <div class='position-relative'>
                        <img src='".$dado['image']."' class='card-img-top' alt='".htmlspecialchars($dado['title'])."' />
                        <div class='overlay'>
                            <span class='offer-text'>Oferta em Dia</span>
                            <div class='discount-icon'>50%</div>
                        </div>
                    </div>
                    <div class='card-body'>
                        <p class='card-text'>Eletrônicos</p>
                        <p class='card-text text-end' style='color: lightpink; margin-top: -2.5em;'><del>R$ ".number_format($dado['price'] * 1.5, 2, ',', '.')."</del></p>
                        <h5 class='card-title'>".htmlspecialchars($dado['title'])."</h5>
                        <div class='description' id='desc-".htmlspecialchars($dado['id'])."'>
                            <p>".htmlspecialchars($dado['description'])."</p>
                        </div>
                        <span class='read-more' onclick='toggleDescription(\"desc-".htmlspecialchars($dado['id'])."\")'>Ler mais</span>
                        <p class='card-text text-end' style='font-size: 1.5em;'><strong> R$ ".number_format($dado['price'], 2, ',', '.')."</strong></p>
                        <p class='card-text'>Vendidos: ".$dado['rating']['count']."</p>
                        <div class='rating-container'>";
            
            for ($i = 0; $i < $fullStars; $i++) {
                echo "<i class='fas fa-star filled'></i>";
            }
            
            if ($halfStar) {
                echo "<i class='fas fa-star-half-alt half'></i>";
            }
            
            for ($i = 0; $i < $emptyStars; $i++) {
                echo "<i class='fas fa-star empty'></i>";
            }
            
            echo "</div>
                </div>
            </div>
        </div>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleDescription(id) {
        var description = document.getElementById(id);
        if (description.classList.contains('expanded')) {
            description.classList.remove('expanded');
            description.nextElementSibling.innerText = 'Ler mais';
        } else {
            description.classList.add('expanded');
            description.nextElementSibling.innerText = 'Ler menos';
        }
    }
</script>
</body>
</html>