<?php
session_start();

    if (isset($_SESSION['success'])){
        $successMessage = $_SESSION['success'];
        unset($_SESSION['success']);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rede de Hoteis IENH</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

    <?php
        include("../backEnd/db/conexao.php");
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-warning font-weight-bold">
        <a class="navbar-brand" href="index.php">Hotelaria IENH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="acomodacoes.php">Acomodações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reservas.php">Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contato.php">Contato</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="sign-in.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sign-up.php">Registre-se</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    if (isset($successMessage)) {
        echo '<div style="color: green;">' . $successMessage . '</div>';
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning text-dark font-weight-bold">Login</div>
                    <div class="card-body">
                        <form action="../backEnd/db/user/loginUser.php" method="POST">
                            <div class="form-group">
                                <label for="email">Usuário</label>
                                <input type="text" class="form-control" name="email" placeholder="Informe seu email">
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="text" class="form-control" name="senha" placeholder="Informe sua senha">
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                            <div>
                                <a href="sign-up.php">Não possui uma conta? Registre-se</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-warning text-dark text-center p-3 fixed-bottom">
        <p class="font-weight-bold">&copy; 2023 Rede de Hoteis IENH. Todos os direitos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>