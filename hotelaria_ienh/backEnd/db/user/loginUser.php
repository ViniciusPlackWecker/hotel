<?php
session_start();

include("../conexao.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta SQL para verificar o login
    $query = "SELECT nome, tipo, senha FROM user WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $query);

    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }

    if (mysqli_num_rows($resultado) == 1) {
        // Login bem-sucedido
        $row = mysqli_fetch_assoc($resultado);
        $nomeUsuario = $row['nome'];
        $tipoUsuario = $row['tipo'];
        $senhaHash = $row['senha'];

        if (password_verify($senha, $senhaHash)) {
            // Senha correta
            // Armazena o tipo e o nome do usuário na sessão
            $_SESSION['tipo'] = $tipoUsuario;
            $_SESSION['nome'] = $nomeUsuario;

            header("Location: ../../../rontEnd/index.php"); // Redireciona para a página inicial
        } else {
            // Senha incorreta
            $_SESSION['error'] = "Credenciais inválidas. Tente novamente.";
            header("Location: ../../../frontEnd/sign-in.php"); // Redireciona de volta para a página de login
            exit;
        }

    } else {
        // USuário não encontrado
        $_SESSION['error'] = "Credenciais inválidas. Tente novamente.";
        header("Location: ../../../rontEnd/sign-in.php"); // Redireciona de volta para a página de login
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
?>
