<?php 

session_start();

$pdo = new PDO("mysql:dbname=rodr7545_gerencia_easy;host=rodrigoflorenciodev.com.br", "rodr7545_dbTeste", "@#Feeling21");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if(isset($nome)) {
    $_SESSION['nome'] = $nome;
} else {
    header('Location: login.php');
}
if($nome  && $email && $telefone) {

    $sql = $pdo->prepare("SELECT * FROM funcionario_teste WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0) {

        $sql = $pdo->prepare("INSERT INTO funcionario_teste (nome, email, telefone) VALUES (:nome, :email, :telefone)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->execute();

        header("Location: index.php");
        exit;

    } else {

        header("Location: adicionar.php");
        exit;

    }

    /* $expiracao = time() + (400);
    setcookie('nomeUsuario', $nome, $expiracao); */

    /* echo 'Nome: '.$nome.' '.$sobrenome."<br/>";

    echo 'E-mail: '.$email."<br/>";

    echo 'Telefone: '.$telefone."<br/>"; */

} else {

    $_SESSION['erro_cadastro'] = 'Preencha todos campos.';

    header("Location: adicionar.php");
    exit;

}

?>