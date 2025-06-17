<?php
require_once __DIR__ . '/../config/conexao.php';


class Pedido
{

    public static function cadastrarPedido($dados)
    {
        $pdo = Conexao::conectar();

        $sql = $pdo->prepare("INSERT INTO pedidos (nome, tamanho, valor, observacao, sabor, pagamento) 
        VALUES (:nome, :tamanho, :valor, :observacao, :sabor, :pagamento)");

        $sql->bindParam(':nome', $dados['nome']);
        $sql->bindParam(':tamanho', $dados['tamanho']);
        $sql->bindParam(':valor', $dados['valor']);
        $sql->bindParam(':observacao', $dados['observacao']);
        $sql->bindParam(':sabor', $dados['sabor']);
        $sql->bindParam(':pagamento', $dados['pagamento']);

        return $sql->execute();
    }

    public static function listarPedidos()
    {
        $pdo = Conexao::conectar();

        $sql = $pdo->prepare('SELECT * FROM pedidos ORDER BY data_pedido DESC');
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
