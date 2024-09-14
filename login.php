<?php
require 'conexao.php';
session_start();

$emailp = $_POST['email'];
$senha = $_POST['senha'];

//acessando email e senha
try{
    $sql = "SELECT * FROM aluno";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    if (isset($_POST['remember']) && $_POST['remember'] == '1') {
        setcookie('login', $email, time() + (60 * 60 * 24 * 30), "/");
    } else {
        if (isset($_COOKIE['login'])) {
            setcookie('login', '', time() - 3600, "/");
        }
    }
} 

if($alunos){
foreach($alunos as $aluno){
if($emailp == htmlspecialchars($aluno['email']) && password_verify($senha, $aluno['senha'])){  
    $_SESSION['login'] = $emailp; 
    $_SESSION['tempo_logado'] = time();
    header("location: cadastro.php");
}else{
    echo "<script type='text/javascript'>
        alert('Login ou Senha incorretos!');
        window.location.href ='index.php';
        </script>";}
 
}}

}catch(PDOException $e){
    echo "Erro ao buscar dados" .$e->getMessage();
}
?>