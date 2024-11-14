<?php
include 'usuarios_controller.php';


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
<body>
    <script src="js/main.js"></script>
    <div class="container-fluid">
    <h2>Cadastro de Usuários</h2>
    <form method="POST" action="">
        <input type="hidden" id="id" name="id" value="<?php echo $userToEdit['id'] ?? ''; ?>">

        <div class="form-group">
        <label for="nome">Nome:</label>
        <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $userToEdit['nome'] ?? ''; ?>" required>
        </div>

        <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input class="form-control" type="text" id="telefone" name="telefone" value="<?php echo $userToEdit['telefone'] ?? ''; ?>" required>
        </div>

        <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value="<?php echo $userToEdit['email'] ?? ''; ?>" required>
        </div>

        <div class="form-group">
        <label for="senha">Senha:</label>
        <input class="form-control" type="password" id="senha" name="senha" required>
        </div>

        <div class="form-group">
        <button type="submit" name="save">Inserir</button>
        <button type="submit" name="update">Atualizar</button>
        <button type="button" onclick="clearForm()">Novo</button>
        </div>

    </form>
</div>
    <div class="container-fluid">
    <h2>Usuários Cadastrados</h2>
    <table border="1">
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
                    <a href="?edit=<?php echo $user['id']; ?>">Editar</a>
                    <a href="?delete=<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div><br><br>
<?php include 'footer.php'; ?>
</body>
</html>


