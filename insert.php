<?php

require 'conexao.php';

if(isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['email']) &&($_POST['senha'])){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha_digitada = $_POST['senha'];
    $confirmarsenha = $_POST['confirmarsenha'];

    
    if(empty($nome) || empty($cpf) || empty($email) || empty($senha_digitada)|| empty($confirmarsenha)){
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    if ($senha_digitada !== $confirmarsenha) {
        echo "<script type='text/javascript'>
        alert('As senhas não coincidem. Por favor, tente novamente.');
        window.location.href = 'cadastroAluno.php';
        </script>";
        exit;
    }

    try{
        $sql = "SELECT * FROM aluno WHERE cpf = :cpf OR email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    

    if ($stmt->rowCount() > 0) {
        echo "<script type='text/javascript'>
        alert('O CPF ou e-mail já estão cadastrados.');
        window.location.href = 'cadastroAluno.php';
        </script>";
        exit;
    }
 } 
        catch (PDOException $e) {
            echo "Erro ao verificar dados: " . $e->getMessage();
            exit;
 }

         $senha_cripto = password_hash($senha_digitada, PASSWORD_BCRYPT);

    try{
        $sql = "INSERT INTO aluno (nome, cpf, email, senha) VALUES (:nome, :cpf, :email,:senha)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha_cripto);
        
        $stmt->execute();

        header('location: index.php');
    }catch(PDOException $e){
        echo "Erro ao cadastrar o aluno: " . $e->getMessage();
    }
}
else {
    echo "Dados incompletos";
}
?>