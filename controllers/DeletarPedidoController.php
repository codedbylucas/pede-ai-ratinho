<?php

require '../models/Pedido.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if (Pedido::deletarPedido($id)) {
        header('Location: ../views/inicio.php');
    }
}else {
    header('Location: ../views/inicio.php');
}