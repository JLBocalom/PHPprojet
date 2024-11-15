<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/di st/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="w-25 p-3">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input class="form-control" type="password" name="senha" required>
            </div>
            <input type="submit" value="Entrar" class="btn btn-primary btn-block">   
        </form>
    </div>
</body>
</html>