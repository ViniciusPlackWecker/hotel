<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelaria IENH</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

    <?php
        session_start();

        include("../backEnd/db/conexao.php");

        $nomeUsuario = "";

        if (isset($_SESSION['tipo'])) {
            $tipoUsuario = $_SESSION['tipo'];
            if (isset($_SESSION['nome'])) {
                $nomeUsuario = $_SESSION['nome'];
            }
        }
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-warning font-weight-bold">
        <a class="navbar-brand" href="index.php">Hotelaria IENH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
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
                <?php
                    if (!isset($_SESSION['tipo'])) {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="sign-in.php">Login</a>
                             </li>
                             <li class="nav-item">
                                <a class="nav-link" href="sign-up.php">Registre-se</a>
                             </li>';
                    }
                ?>

            </ul>
        </div>
    </nav>
    <div class="container-fluid image-above-text">
        <div class="row">
            <div class="col-md-6 p-0 order-md-1">
                <img src="../img/HotelFront.jpg" alt="Hotel Image" class="img-fluid mx-auto">
            </div>
                <?php 
                    if (!empty($nomeUsuario)){
                        echo '<div class="col-md-6 p-5 order-md-2">
                                <h1>Bem-vindo a Rede de Hoteis IENH, '. $nomeUsuario . '</h1>
                                <p>Seja recebido com conforto e hospitalidade em nosso hotel de classe mundial. Oferecemos acomodações de luxo para todos os viajantes.</p>
                                <a href="contato.php" class="btn btn-primary">Entre em contato conosco</a>
                              </div>';
                    }else{
                        echo '<div class="col-md-6 p-5 order-md-2">
                                <h1>Bem-vindo a Rede de Hoteis IENH</h1>
                                <p>Seja recebido com conforto e hospitalidade em nosso hotel de classe mundial. Oferecemos acomodações de luxo para todos os viajantes.</p>
                                <a href="contato.php" class="btn btn-primary">Entre em contato conosco</a>
                              </div>';
                    }
                ?>
        </div>
    </div>
    <div class="container-fluid image-above-text">
        <div class="row">
            <div class="col-md-6 p-0 order-md-2">
                <img src="../img/HotelFront.jpg" alt="Hotel Image" class="img-fluid mx-auto">
            </div>
            <div class="col-md-6 p-5 order-md-1 ">
                <h1>Acomodações de Luxo com Vista Para o Mar</h1>
                <p>Desfrute de nossas acomodações mundialmente aclamadas.</p>
                <a href="acomodacoes.php" class="btn btn-primary">Veja nossos quartos disponíveis</a>
            </div>
        </div>
    </div>

    <footer class="bg-warning text-dark text-center p-3">
        <p class="font-weight-bold">&copy; 2023 Rede de Hoteis IENH. Todos os direitos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
