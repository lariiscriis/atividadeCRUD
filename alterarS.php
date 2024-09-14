<?php
session_start();
require 'conexao.php'; 
$email = $_SESSION['login'];

if (isset($_POST['senha']) && isset($_POST['novasenha']) && isset($_POST['confirmarnovasenha'])) {
    $senhaA = $_POST['senha'];
    $senha_nova = $_POST['novasenha'];
    $confirmSenha = $_POST['confirmarnovasenha'];

    if ($senha_nova !== $confirmSenha) {
        echo "<script type='text/javascript'>
        alert('As senhas novas não coincidem. Por favor, tente novamente.');
        window.location.href = 'alterarsenha.php';
        </script>";
        exit;
    }

    try {
  
        $sql = "SELECT senha FROM aluno WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if (!password_verify($senhaA, $result['senha'])) {
            echo "<script type='text/javascript'>
            alert('Senha atual incorreta. Por favor, tente novamente.');
            window.location.href = 'alterarsenha.php';
            </script>";
            exit;
        }


        $senha_cripto = password_hash($senha_nova, PASSWORD_BCRYPT);
        $sql = "UPDATE aluno SET senha = :senha WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':senha', $senha_cripto);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo "<script type='text/javascript'>
        alert('Senha alterada com sucesso!');
        window.location.href = 'cadastro.php';
        </script>";
        exit;
    } catch (PDOException $e) {
        echo "Erro ao alterar senha: " . $e->getMessage();
    }
} else {
    
    echo "<script type='text/javascript'>
    alert('Dados inválidos. Por favor, preencha todos os campos.');
    window.location.href = 'alterarsenha.php';
    </script>";
}
?>
