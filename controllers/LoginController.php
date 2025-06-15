<?php

session_start();
$token = true;
$mensagem = null;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $senha = $_POST['senha'];

    if($senha == '1234'){
        $_SESSION['logado'] = $token;
        header('Location: ../views/inicio.php');
        exit;
    }else {
        header('Location: ../views/login.php?erro=1');
        exit;
    }


}