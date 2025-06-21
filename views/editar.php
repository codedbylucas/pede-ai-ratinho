<?php
include '../models/Pedido.php';
session_start();
if (!isset($_SESSION['logado'])) exit;

$dados = null;
if (isset($_GET['id'])) {
    $dados = Pedido::buscarPorId($_GET['id']);
}
if (!$dados) {
    echo "<p style='color:red;'>Erro: Pedido não encontrado.</p>";
    exit;
}
include '../templates/form-pedido.php';