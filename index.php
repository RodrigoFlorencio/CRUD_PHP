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

    require 'config.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $lista = $usuarioDao->findAll();

    ?>

    <div class="container">

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

                        <?php foreach ($lista as $usuario):?>

                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <?=$usuario->getId();?>
                                    </th>
                                    
                                    <td>
                                        <?=$usuario->getNome();?>
                                    </td>

                                    <td>
                                        <?=$usuario->getEmail();?>
                                    </td>

                                    <td>
                                        <?=$usuario->getTelefone();?>
                                    </td>

                                    <td>
                                        <a href="editar.php?id=<?=$usuario->getId();?>">Editar</a>
                                    </td>

                                    <td>
                                        <a href="excluir.php?id=<?=$usuario->getId();?>">Excluir</a>
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
