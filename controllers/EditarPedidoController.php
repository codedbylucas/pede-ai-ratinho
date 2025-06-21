<?php

require_once '../config/conexao.php';
require_once '../models/Pedido.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = trim($_POST['nome']);
    $observacao = trim($_POST['observacao'] ?? '');
    $valor = str_replace(',', '.', $_POST['valor']);
    $pagamento = $_POST['pagamento'];

    if (empty($id) || empty($nome) || empty($valor) || empty($pagamento)) {
        echo json_encode(['sucesso' => false, 'erro' => 'Preencha todos os campos obrigatórios']);
        exit;
    }

    $dados = [
        'id' => $id,
        'nome' => $nome,
        'observacao' => $observacao,
        'valor' => $valor,
        'pagamento' => $pagamento
    ];

    if (Pedido::editarPedido($dados)) {
        echo json_encode([
            'sucesso' => true,
            'pedido' => $dados
        ]);
    } else {
        echo json_encode([
            'sucesso' => false,
            'erro' => 'Erro ao atualizar o pedido'
        ]);
    }
    exit;
}
