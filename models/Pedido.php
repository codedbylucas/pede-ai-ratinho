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

    public static function buscarPorId($id)
    {
        $pdo = Conexao::conectar();

        $sql = $pdo->prepare('SELECT * FROM pedidos WHERE id = :id');
        $sql->bindParam('id', $id);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function editarPedido($dados)
    {
        $pdo = Conexao::conectar();

        $sql = $pdo->prepare('UPDATE pedidos 
        SET nome = :nome, tamanho = :tamanho, valor = :valor, observacao = :observacao, sabor = :sabor, pagamento = :pagamento  
        WHERE id = :id');

        $sql->bindValue(':nome', $dados['nome']);
        $sql->bindValue(':tamanho', $dados['tamanho']);
        $sql->bindValue(':valor', $dados['valor']);
        $sql->bindValue(':observacao', $dados['observacao']);
        $sql->bindValue(':sabor', $dados['sabor']);
        $sql->bindValue(':pagamento', $dados['pagamento']);
        $sql->bindValue(':id', $dados['id']);

        return $sql->execute();
    }

    public static function deletarPedido($id) {
        $pdo = Conexao::conectar();
        $sql = $pdo->prepare('DELETE FROM pedidos WHERE id = :id');
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }
}
