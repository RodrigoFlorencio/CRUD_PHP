<?php

$id = filter_input(INPUT_GET, 'id');
if ($id) {

    $info = [];
    $pdo = new PDO("mysql:dbname=rodr7545_gerencia_easy;host=rodrigoflorenciodev.com.br", "rodr7545_dbTeste", "@#Feeling21");

    $sql = $pdo->prepare("DELETE FROM funcionario_teste WHERE id = :id");
    $sql->bindParam(':id', $id);
    $sql->execute();

    header("Location: index.php");
    exit;
    
} else {
    header("Location: index.php");
    exit;
}

?>
