<?php

    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');

    if($nome && $email) {
        session_start();

        $_SESSION['logged_in'] = true;

        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php");
        exit;
    }

?>
