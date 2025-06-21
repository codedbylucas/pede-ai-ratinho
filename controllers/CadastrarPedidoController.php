<?php

require_once '../config/conexao.php';
require_once '../models/Pedido.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $valor = str_replace(',', '.', $_POST['valor']);
    $pagamento = $_POST['pagamento'];
    $observacao = trim($_POST['observacao'] ?? '');

    if (empty($nome) || empty($valor) || empty($pagamento)) {
        echo json_encode(['erro' => 'Preencha todos os campos obrigatórios']);
        exit;
    }

    $dados = [
        'nome' => $nome,
        'valor' => $valor,
        'pagamento' => $pagamento,
        'observacao' => $observacao
    ];

    header('Content-Type: application/json');

    if (Pedido::cadastrarPedido($dados)) {
        echo json_encode([
            "sucesso" => true,
            "pedido" => $dados
        ]);
        exit;
    } else {
        echo json_encode(['erro' => 'Erro ao cadastrar o pedido']);
    }
    exit;
}
