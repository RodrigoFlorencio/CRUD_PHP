<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP Form</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JavaScript do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="header">
        <h1>Cadastro PHP</h1>
    </div>

    <?php

    session_start();

    if (!$_SESSION['autenticado']) {
        header('Location: login.php');
    }

    if ($_SESSION['erro_cadastro'] && !empty($_SESSION['erro_cadastro'])) {
        $erroCadastro = $_SESSION['erro_cadastro'];
        $_SESSION['erro_cadastro'] = '';
    }

    $id = filter_input(INPUT_GET, 'id');
    if ($id) {

        $info = [];
        $pdo = new PDO("mysql:dbname=rodr7545_gerencia_easy;host=rodrigoflorenciodev.com.br", "rodr7545_dbTeste", "@#Feeling21");

        $sql = $pdo->prepare("SELECT * FROM funcionario_teste WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            header("Location: index.php");
            exit;
        }
    } else {
        header("Location: index.php");
        exit;
    }

    ?>

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="texto-principal">

                    <p>
                        Editar Funcionário
                    </p>

                </div>

            </div>

        </div>

        <?php
        if (isset($_COOKIE['nomeUsuario'])) {
            $nomeUser = $_COOKIE['nomeUsuario'];
            echo "<p>" . $nomeUser . "</p>";
        }
        ?>

        <form method="POST" action="editar_action.php">

            <input type="hidden" name="id" value="<?= $info['id']; ?>">

            <div class="row formulario">

                <div class="col-3">

                    <input type="text" name="nome" value="<?= $info['nome']; ?>">

                </div>

                <div class="col-3">

                    <input type="text" name="email" value="<?= $info['email']; ?>">

                </div>

                <div class="col-3">

                    <input type="text" name="telefone" value="<?= $info['telefone']; ?>">

                </div>

            </div>

            <div class="row">

                <div class="col-3">

                    <div class="btn-enviar">
                        <button type="submit" class="btn btn-primary">
                            Editar
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>