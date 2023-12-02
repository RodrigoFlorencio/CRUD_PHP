<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogin.css">
    <title>PHP Form</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JavaScript do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="texto-principal">

                    <p>
                        Login
                    </p>

                </div>

            </div>

        </div>

        <form method="POST" action="login_action.php">

            <div class="row formulario">

                <div class="box-login">

                    <div class="col-6">

                        <input type="text" name="nome" placeholder="Nome">

                    </div>

                    <div class="col-6">

                        <input type="text" name="email" placeholder="E-mail">

                    </div>

                    <div class="btn-enviar">
                        <button type="submit" class="btn btn-primary">
                            Entrar
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
