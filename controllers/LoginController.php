<?php

session_start();
$token = true;
$mensagem = null;
define('SENHA_CORRETA', '1234');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $senha = $_POST['senha'] ?? '';

    if ($senha === SENHA_CORRETA) {
        $_SESSION['logado'] = $token;
        header('Location: ../views/inicio.php');
        exit;
    } else {
        header('Location: ../views/login.php?erro=1');
        exit;
    }
}
