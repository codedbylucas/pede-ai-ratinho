<?php

session_start();
unset($_SESSION['logado']);
header('Location: ../views/login.php');
