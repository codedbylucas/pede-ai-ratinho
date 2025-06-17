<?php

require_once '../config/conexao.php';
require_once '../models/Pedido.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $tamanho = $_POST['tamanho'];
    $observacao = $_POST['observacao'];
    $saborBase = $_POST['sabores'];
    $pagamento = $_POST['pagamento'];
    $valor = str_replace(',', '.', $_POST['valor']);

    $dados = [
        'nome' => $nome,
        'tamanho' => $tamanho,
        'observacao' => $observacao,
        'sabor' => $saborBase,
        'pagamento' => $pagamento,
        'valor' => $valor
    ];

    if (Pedido::cadastrarPedido($dados)) {
        header('Location: ../views/inicio.php');
        exit;
    } else {
        echo 'Erro ao cadastrar o pedido';
    }
}
