<?php
session_start();


$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

// $nome = $_POST['nome'];
// $email = $_POST['email'];
// $senha = $_POST['senha'];

// Verifique se o campo de senha está vazio
if (empty($senha)) {
    // A senha está vazia, trate isso como um erro
    $_SESSION['error'] = "A senha não pode ser vazia.";
    header("Location: ../../../frontEnd/sign-up.php");
    exit;
}

$senha = password_hash($senha, PASSWORD_DEFAULT);

include("../conexao.php");

$query = "SELECT email FROM user WHERE email = '$email'";
$verificaBanco = mysqli_query($conexao, $query);

$insertQuery = "INSERT INTO user (nome, email, senha, active, tipo) VALUES ('$nome', '$email', '$senha', 1, 1);";

if (!$verificaBanco) {
    die("Error: " . mysqli_error($conexao));
}

if (mysqli_num_rows($verificaBanco) > 0) {
    $_SESSION['error'] = "O email já está em uso. Use um endereço de email diferente.";
    header("Location: ../../../frontEnd/sign-up.php");
    exit;
} else {
    $inserirBanco = mysqli_query($conexao, $insertQuery);

    if (!$inserirBanco) {
        die("Error: " . mysqli_error($conexao));
    } else {
        $_SESSION['success'] = "Registro de usuário bem-sucedido!";
        $_SESSION['senha'] = $_POST['senha'];
        header("Location: ../../../frontEnd/sign-in.php");
        exit;
    }
}
    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
?>
