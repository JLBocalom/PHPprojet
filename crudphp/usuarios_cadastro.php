<?php
include 'usuarios_controller.php';

//Prepara pa gerenciar a sessão
session_start();

// Verifica se o usuário está registrado na sessão (logado)
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Armazena informações do usuário
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];

// Função para lidar com o logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
//Pega todos os usuários para preencher os dados da tabela
$users = getUsers();

//Variável que guarda o ID do usuário que será editado
$userToEdit = null;

// Verifica se existe o parâmetro edit pelo método GET
// e sé há um ID para edição de usuário
if (isset($_GET['edit'])) {
    $userToEdit = getUser($_GET['edit']);
}
?>
<?php include 'header.php'; ?>
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
    <script src="js/main.js"></script>
    <div class="container-fluid">
    <h2 style="text-align:center">Cadastro de Usuários</h2>
    <form method="POST" action="">
        <input type="hidden" id="id" name="id" value="<?php echo $userToEdit['id'] ?? ''; ?>">
        <div class="form-group row">
        <div class="form-group row" style="width:50%; text-align:center">
        <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
            <div class="col-sm-10">
            <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $userToEdit['nome'] ?? ''; ?>" placeholder="Ex:José Leonardo Bocalom" required>
            </div>
        </div>

        <div class="form-group row" style="width:50%; text-align:center">
        <label for="telefone" class="col-sm-2 col-form-label">Telefone:</label>
            <div class="col-sm-10">
            <input class="form-control" type="text" id="telefone" name="telefone" value="<?php echo $userToEdit['telefone'] ?? ''; ?>" placeholder="Ex:(16)99999-9999" required>
            </div>
        </div>
        </div>
        <div class="form-group row">
        <div class="form-group row" style="width:50%; text-align:center">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
            <input class="form-control" type="email" id="email" name="email" value="<?php echo $userToEdit['email'] ?? ''; ?>" placeholder="Ex:seuemai@gmail.com" required>
            </div>    
        </div>

        <div class="form-group row" style="width:50%; text-align:center; item-align:right">
        <label for="senha" class="col-sm-2 col-form-label">Senha:</label>
            <div class="col-sm-10">
            <input class="form-control" type="password" id="senha" name="senha" required>
            </div>
        </div>
        </div>
        <div style="text-align:center">
        <button class="btn btn-outline-primary" type="submit" name="save">Inserir</button>
        <button class="btn btn-outline-primary" type="submit" name="update">Atualizar</button>
        <button class="btn btn-outline-primary" type="button" onclick="clearForm()">Novo</button>
        </div>

    </form>
</div>
    <div class="container-fluid">
    <h2>Usuários Cadastrados</h2>
    <table border="1" class="table table-hover table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <!--Faz um loop FOR no resultset de usuários e preenche a tabela-->
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['nome']; ?></td>
                <td><?php echo $user['telefone']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                <a href="?edit=<?php echo $user['id']; ?>" class="btn btn-success" type="submit" name="save">Editar</a>
                <a href="?delete=<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');" class="btn btn-danger" type="submit" name="save">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div><br><br>
<?php include 'footer.php'; ?>
</body>
</html>


