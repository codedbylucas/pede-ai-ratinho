<?php
require_once __DIR__ . '/../config/conexao.php';

class Pedido
{
    protected static $pdo;

    private static function getConexao()
    {
        if (!self::$pdo) {
            self::$pdo = Conexao::conectar();
        }
        return self::$pdo;
    }

    public static function cadastrarPedido($dados)
    {
        $sql = self::getConexao()->prepare(
            "INSERT INTO pedidos (nome, valor, observacao, pagamento) 
             VALUES (:nome, :valor, :observacao, :pagamento)"
        );

        $sql->bindValue(':nome', $dados['nome']);
        $sql->bindValue(':valor', $dados['valor']);
        $sql->bindValue(':observacao', $dados['observacao']);
        $sql->bindValue(':pagamento', $dados['pagamento']);

        return $sql->execute();
    }

    public static function listarPedidos()
    {
        $sql = self::getConexao()->prepare(
            "SELECT * FROM pedidos ORDER BY data_pedido DESC"
        );
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id)
    {
        $sql = self::getConexao()->prepare(
            "SELECT * FROM pedidos WHERE id = :id"
        );
        $sql->bindValue(':id', $id);
        $sql->execute();

        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado ?: false;
    }

    public static function editarPedido($dados)
    {
        $sql = self::getConexao()->prepare(
            "UPDATE pedidos 
             SET nome = :nome, valor = :valor, pagamento = :pagamento, observacao = :observacao 
             WHERE id = :id"
        );

        $sql->bindValue(':nome', $dados['nome']);
        $sql->bindValue(':valor', $dados['valor']);
        $sql->bindValue(':pagamento', $dados['pagamento']);
        $sql->bindValue(':observacao', $dados['observacao']);
        $sql->bindValue(':id', $dados['id']);

        return $sql->execute();
    }

    public static function deletarPedido($id)
    {
        $sql = self::getConexao()->prepare(
            "DELETE FROM pedidos WHERE id = :id"
        );
        $sql->bindValue(':id', $id);

        return $sql->execute();
    }
}
