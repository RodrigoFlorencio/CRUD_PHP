<?php

    $pdo = new PDO("mysql:dbname=rodr7545_gerencia_easy;host=rodrigoflorenciodev.com.br", "rodr7545_dbTeste", "@#Feeling21");

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone');

    $sql = $pdo->prepare("UPDATE funcionario_teste SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: index.php");
    exit;
?>
