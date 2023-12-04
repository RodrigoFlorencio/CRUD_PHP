<?php

    require 'config.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone');

    $funcionario = $usuarioDao->findById($id);
    $funcionario->setNome($nome);
    $funcionario->setEmail($email);
    $funcionario->setTelefone($telefone);

    $usuarioDao->update($funcionario);

    header("Location: index.php");
    exit;
    
?>
