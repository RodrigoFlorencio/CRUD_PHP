<?php 

    require 'config.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone');

    if(isset($nome)) {
        $_SESSION['nome'] = $nome;
    } else {
        header('Location: login.php');
    }
    if($nome  && $email && $telefone) {

        if($usuarioDao->findByEmail($email) === false) {

            $novoFuncionario = new Usuario();
            $novoFuncionario->setNome($nome);
            $novoFuncionario->setEmail($email);
            $novoFuncionario->setTelefone($telefone);

            $usuarioDao->add($novoFuncionario);

            header("Location: index.php");
            exit;

        } else {

            header("Location: adicionar.php");
            exit;

        }

    } else {

        $_SESSION['erro_cadastro'] = 'Preencha todos campos.';

        header("Location: adicionar.php");
        exit;

    }

?>