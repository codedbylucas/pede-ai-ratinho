<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Área Restrita</title>
  <link rel="stylesheet" href="../assets/css/login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <div class="login-container">
    <div class="card">
      <div class="lock-icon">
        <i class="fas fa-lock"></i>
      </div>
      <h1>Área Restrita</h1>
      <p>Digite a senha para acessar</p>
      <form action="../controllers/LoginController.php" method="POST">
        <input type="password" name="senha" placeholder="Senha de acesso" required />
        <button type="submit">Entrar</button>
      </form>
      <?php if (isset($_GET['erro'])): ?>
        <p style="color: red;">Senha incorreta!</p>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>