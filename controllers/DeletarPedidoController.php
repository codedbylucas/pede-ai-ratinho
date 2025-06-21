<?php
require_once '../models/Pedido.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    Pedido::deletarPedido($_GET['id']);
}

header('Location: ../views/inicio.php');
exit;