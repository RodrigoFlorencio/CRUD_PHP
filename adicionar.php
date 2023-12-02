<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
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

            <div class="col-12">

                <div class="texto-principal">

                    <p>
                        Adiconar Funcionários
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

        <form method="POST" action="form.php">

            <div class="row formulario">

                <div class="col-3">

                    <input type="text" name="nome" placeholder="Nome">

                </div>

                <div class="col-3">

                    <input type="text" name="email" placeholder="E-mail">

                </div>

                <div class="col-3">

                    <input type="text" name="telefone" placeholder="Telefone">

                </div>

            </div>

            <div class="row">

                <div class="col-3">

                    <div class="btn-enviar">
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                    </div>

                </div>

            </div>

    </div>

    </div>

</body>

</html>