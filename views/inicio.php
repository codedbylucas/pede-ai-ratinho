<?php
session_start();

if (empty($_SESSION['logado'])){
  header('Location: login.php');
  exit;
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pede Aí Gazin</title>
  <link rel="stylesheet" href="../assets/css/layout.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>
  <?php require '../templates/header.php';?>

  <main>
    <div class="botoes-acao">
      <a href="https://shop.beetech.com.br/acaidopereira/" target="_blank" class="btn azul">Olhar cardápio</a>
      <a href="formulario.php" class="btn amarelo">Fazer Pedido</a>
    </div>

    <section class="tabela">
      <h2>Pedidos Atuais - <span id="dataHora">14/06/2025 21:21</span></h2>
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
          <tr>
            <td>Lucas Gabriel</td>
            <td>1 de 400ML com leite condensado</td>
            <td>R$ 14,50</td>
            <td>PIX</td>
            <td>
              <i class="fa-solid fa-pen-to-square editar"></i>
              <i class="fa-solid fa-trash excluir"></i>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <a href="#" class="btn-whatsapp" title="Enviar WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</body>
</html>
