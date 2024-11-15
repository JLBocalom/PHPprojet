<?php include 'principal_controller.php'; ?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="flex-grow-1">
        <!-- Conteúdo da página vai aqui -->
        <h2 class="container text-center">Olá, <?php echo htmlspecialchars($nome); ?>!</h2>
    </div>
    </body>
</html>

<?php include 'footer.php'; ?>
