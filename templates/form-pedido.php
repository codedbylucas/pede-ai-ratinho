<?php
$isEdicao = isset($dados['id']);
$action = $isEdicao ? '../controllers/EditarPedidoController.php' : '../controllers/CadastrarPedidoController.php';
?>

<form method="POST" action="<?= $action ?>">
  <?php if ($isEdicao): ?>
    <input type="hidden" name="id" value="<?= $dados['id'] ?>">
  <?php endif; ?>

  <label for="nome">Nome</label>
  <input type="text" id="nome" name="nome" placeholder="Nome" value="<?= $dados['nome'] ?? '' ?>" required />

  <label for="observacao">Pedido</label>
  <input type="text" id="observacao" name="observacao" placeholder="EX: 1 de 400ml, com leite condensado" value="<?= $dados['observacao'] ?? '' ?>" required />

  <label for="valor">Valor</label>
  <input type="text" id="valor" name="valor" placeholder="R$ 0,00" value="<?= isset($dados['valor']) ? number_format($dados['valor'], 2, ',', '.') : '' ?>" required />

  <label for="pagamento">Método de Pagamento</label>
  <select id="pagamento" name="pagamento" required>
    <option value="">Selecione</option>
    <option value="Pix" <?= ($dados['pagamento'] ?? '') === 'Pix' ? 'selected' : '' ?>>PIX</option>
    <option value="Dinheiro" <?= ($dados['pagamento'] ?? '') === 'Dinheiro' ? 'selected' : '' ?>>Dinheiro</option>
    <option value="Cartao" <?= ($dados['pagamento'] ?? '') === 'Cartao' ? 'selected' : '' ?>>Cartão</option>
  </select>

  <div class="botoes-modal">
    <button type="submit" class="btn-confirmar">
      <?= $isEdicao ? 'Salvar Alterações' : 'Adicionar Pedido' ?>
    </button>
  </div>
</form>
