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

    /* session_start();

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {

        header("Location: login.php");
        exit();
    } */

    $lista = [];
    $pdo = new PDO("mysql:dbname=rodr7545_gerencia_easy;host=rodrigoflorenciodev.com.br", "rodr7545_dbTeste", "@#Feeling21");

    $sql = $pdo->query("SELECT * FROM funcionario_teste");

    if ($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    ?>

    <div class="container">

        <!-- Modal -->
        <div class="modal fade <?php echo isset($erroCadastro) ? 'show' : ''; ?>" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="<?php echo isset($erroCadastro) ? 'display: block;' : ''; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> -->
                    <div class="modal-body">
                        <?php echo isset($erroCadastro) ? $erroCadastro : ''; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="menu">
                <a href="adicionar.php">ADD Funcionário</a>

                <a href="logout.php">Sair</a>
            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <div class="texto-principal">

                    <p>
                        Funcionários
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

        <div class="row">

            <div class="formulario">

                <div class="table-responsive">

                    <table class="table table-dark">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <?php foreach ($lista as $funcionario) : ?>

                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <?= $funcionario['id']; ?>
                                    </th>
                                    <td>
                                        <?= $funcionario['nome']; ?>
                                    </td>
                                    <td>
                                        <?= $funcionario['email']; ?>
                                    </td>
                                    <td>
                                        <?= $funcionario['telefone']; ?>
                                    </td>
                                    <td>
                                        <a href="editar.php?id=<?= $funcionario['id']; ?>">Editar</a>
                                    </td>
                                    <td>
                                        <a href="excluir.php?id=<?= $funcionario['id']; ?>">Excluir</a>
                                    </td>
                                </tr>

                            </tbody>

                        <?php endforeach; ?>

                    </table>

                </div>

            </div>

        </div>

    </div>

</body>

</html>