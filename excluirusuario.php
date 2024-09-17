<?php
session_start();
require 'conexao.php'; 
$email = $_SESSION['login'];

    try {
      
        $sql = "DELETE FROM aluno WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

  
        if ($stmt->rowCount() > 0) {
         header("Location: index.php");
            exit; 
        } else {
     
            echo "Nenhum aluno encontrado com o email fornecido!";
        }

    } catch (PDOException $e) {
       
        echo "Erro ao deletar aluno: " . $e->getMessage();
    }

?>
