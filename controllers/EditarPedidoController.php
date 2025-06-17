<?php

require_once '../models/Pedido.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $tamanho = $_POST['tamanho'];
    $observacao = $_POST['observacao'];
    $saborBase = $_POST['sabores'];
    $pagamento = $_POST['pagamento'];
    $valor = str_replace(',', '.', $_POST['valor']);
    $id = $_POST['id'];

    $dados = [
        'id' => $id,
        'nome' => $nome,
        'tamanho' => $tamanho,
        'observacao' => $observacao,
        'sabor' => $saborBase,
        'pagamento' => $pagamento,
        'valor' => $valor
    ];

    if(Pedido::editarPedido($dados)){
        header('Location: ../views/inicio.php'); 
        exit;
    }else {
        echo 'Algo deu errado';
    }

    
}
