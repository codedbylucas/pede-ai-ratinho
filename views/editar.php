<?php
include '../models/Pedido.php';

session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}

if (isset($_GET['id'])) {
    $dados = Pedido::buscarPorId($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Pedido</title>
    <link rel="stylesheet" href="../assets/css/layout.css" />
    <link rel="stylesheet" href="../assets/css/form.css" />
</head>

<body>
    <?php require '../templates/header.php'; ?>

    <main class="container">
        <h1 class="inui">Editar Pedido de Açaí</h1>

        <form method="POST" action="../controllers/EditarPedidoController.php">
            <input type="hidden" name="id" value="<?= $dados['id'] ?>">

            <label for="nome">Funcionário:</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: Lucas" value="<?= $dados['nome'] ?>" required />

            <label for="tamanho">Tamanho do Açaí:</label>
            <select id="tamanho" name="tamanho" required>
                <option value="">Selecione</option>
                <option value="300ML" <?= $dados['tamanho'] == '300ML' ? 'selected' : '';?>>300ML</option>
                <option value="400ML" <?= $dados['tamanho'] == '400ML' ? 'selected' : '';?>>400ML</option>
                <option value="500ML" <?= $dados['tamanho'] == '500ML' ? 'selected' : '';?>>500ML</option>
            </select>

            <label for="observacao">Complementos / Observações:</label>
            <textarea id="observacao" name="observacao" rows="2" placeholder="Ex: com leite condensado" ><?= $dados['observacao'] ?></textarea>

            <label for="sabor">Sabor/Base:</label>
            <select id="sabor" name="sabores" required>
                <option value="">Selecione</option>
                <option value="Tradicional" <?= $dados['sabor'] == 'Tradicional' ? 'selected' : '';?>>Tradicional</option>
                <option value="Zero Açúcar" <?= $dados['sabor'] == 'Zero Açúcar' ? 'selected' : '';?>>Zero Açúcar</option>
            </select>

            <label for="valor">Valor do Açaí (R$):</label>
            <input type="text" id="valor" name="valor" value="<?= $dados['valor'] ?>" required />

            <label for="pagamento">Forma de Pagamento:</label>
            <select id="pagamento" name="pagamento" required>
                <option value="">Selecione</option>
                <option value="Pix" <?= $dados['pagamento'] == 'Pix' ? 'selected' : '';?>>PIX</option>
                <option value="Dinheiro" <?= $dados['pagamento'] == 'Dinheiro' ? 'selected' : '';?>>Dinheiro</option>
                <option value="Cartao" <?= $dados['pagamento'] == 'Cartao' ? 'selected' : '';?>>Cartão</option>
            </select>

            <button type="submit">Salvar Pedido</button>
        </form>
    </main>
</body>

</html>