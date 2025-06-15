<?php
$host = 'sql111.infinityfree.com';
$db = 'if0_39234423_acai';  
$user = 'if0_39234423';
$pass = 'dravem123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage();
}
?>
