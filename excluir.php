<?php

    require 'config.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $id = filter_input(INPUT_GET, 'id');

    if ($id) {

        $funcionario = $usuarioDao->delete($id);

        header("Location: index.php");
        exit;
        
    } else {
        header("Location: index.php");
        exit;
    }

?>
