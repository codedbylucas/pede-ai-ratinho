<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastrar Pedido</title>
  <link rel="stylesheet" href="../assets/css/layout.css"/>
  <link rel="stylesheet" href="../assets/css/form.css"/>
</head>
<body>
  <?php require '../templates/header.php'; ?>

  <main class="container">
    <h1 class="inui">Cadastrar Pedido de Açaí</h1>

    <form method="POST" action="../controllers/CadastrarPedidoController.php">

      <label for="nome">Funcionário:</label>
      <input type="text" id="nome" name="nome" placeholder="Ex: Lucas Gabriel" required />

      <label for="tamanho">Tamanho do Açaí:</label>
      <select id="tamanho" name="tamanho" required>
        <option value="">Selecione</option>
        <option value="300ml">300ML</option>
        <option value="400ml">400ML</option>
        <option value="500ml">500ML</option>
      </select>

      <label for="observacao">Complementos / Observações:</label>
      <textarea id="observacao" name="observacao" rows="2" placeholder="Ex: com leite condensado"></textarea>

      <label for="sabores">Sabor/Base:</label>
      <select id="sabores" name="sabores" required>
        <option value="">Selecione</option>
        <option value="Tradicional">Tradicional</option>
        <option value="Zero Açúcar">Zero Açúcar</option>
      </select>

      <label for="pagamento">Forma de Pagamento:</label>
      <select id="pagamento" name="pagamento" required>
        <option value="">Selecione</option>
        <option value="PIX">PIX</option>
        <option value="Dinheiro">Dinheiro</option>
        <option value="Cartão">Cartão</option>
      </select>

      <button type="submit">Cadastrar Pedido</button>
    </form>
  </main>
</body>
</html>
