<?php
require_once '../models/Pedido.php';
session_start();

if (!isset($_SESSION['logado'])) {
  header('Location: login.php');
  exit;
}

$pedidos = Pedido::listarPedidos();

$mensagem = "Pedidos de Açaí - ";
$contador = 1;

foreach ($pedidos as $pedido) {
  $mensagem .= "Pedido {$contador}\n";
  $mensagem .= "{$pedido['nome']}\n";
  if (!empty($pedido['observacao'])) {
    $mensagem .= "{$pedido['observacao']}\n";
  }
  $mensagem .= "R$ " . number_format($pedido['valor'], 2, ',', '.') . "\n";
  $mensagem .= "{$pedido['pagamento']}\n";
  $mensagem .= "----------------------\n";
  $contador++;
}

$linkWhatsapp = "https://wa.me/554491095494?text=" . urlencode($mensagem);

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pede Aí</title>
  <link rel="stylesheet" href="../assets/css/layout.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <?php require '../templates/header.php'; ?>

  <main>
    <div class="botoes-acao">
      <button class="btn azul" id="abrirModal">Olhar cardápio</button>
      <button class="btn amarelo" id="abrirModalFormulario">Fazer Pedido</button>
    </div>

    <section class="tabela">
      <h2>Pedidos Atuais</span></h2>
      <table>
        <thead>
          <tr>
            <th>Funcionário</th>
            <th>Pedido</th>
            <th>Valor</th>
            <th>Método de Pagamento</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pedidos as $dados): ?>
            <tr id="pedido-<?= $dados['id'] ?>">
              <td><?= htmlspecialchars($dados['nome']) ?></td>
              <td><?= strtolower($dados['observacao']) ?></td>
              <td><?= 'R$ ' . number_format($dados['valor'], 2, ',', '.') ?></td>
              <td><?= htmlspecialchars($dados['pagamento']) ?></td>
              <td>
                <a href="javascript:void(0)" class="btn-editar" data-id="<?= $dados['id'] ?>"><i class="fa-solid fa-pen-to-square editar"></i></a>
                <a href="../controllers/DeletarPedidoController.php?id=<?= $dados['id'] ?>"><i class="fa-solid fa-trash excluir"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>

  <div id="modalCardapio" class="modal">
    <div class="modal-conteudo">
      <span class="fechar" id="fecharModal">&times;</span>
      <iframe src="https://shop.beetech.com.br/acaidopereira/" width="100%" height="500px" style="border: none;"></iframe>
    </div>
  </div>

  <div id="modalFormulario" class="modal">
    <div class="modal-conteudo">
      <button class="fechar" id="fecharModalFormulario">&times;</button>
      <?php $dados = [];
      include '../templates/form-pedido.php'; ?>
    </div>
  </div>

  <div id="modalEditar" class="modal">
    <div class="modal-conteudo">
      <span class="fechar" id="fecharEditarModal">&times;</span>
      <div id="conteudoEditarModal">Carregando...</div>
    </div>
  </div>

  <div id="alerta" class="alerta oculto"></div>

  <a href="<?= $linkWhatsapp ?>" class="btn-whatsapp" title="Enviar no WhatsApp" target="_blank">
    <i class="fab fa-whatsapp"></i>
  </a>

  <script src="../assets/js/script.js"></script>
  <script src="../assets/js/form.js"></script>

</body>

</html>