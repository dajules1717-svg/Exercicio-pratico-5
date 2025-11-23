<?php
require 'conexao.php';

$contatos = $conexao->query("SELECT * FROM contatos ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Agenda</title>
    <style>
        body { font-family: Verdana, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .form-cadastro input { margin: 5px; padding: 5px; }
        .form-cadastro button { padding: 5px 10px; }
    </style>
</head>
<body>

<h2>Agenda de Contatos</h2>

<form action="salvar.php" method="post" class="form-cadastro">
    <input type="text" name="nome" placeholder="Nome completo" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="text" name="telefone" placeholder="Telefone" required>
    <button type="submit">Adicionar</button>
</form>

<h3>Contatos Cadastrados</h3>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contatos as $contato): ?>
        <tr>
            <td><?= htmlspecialchars($contato['nome']) ?></td>
            <td><?= htmlspecialchars($contato['email']) ?></td>
            <td><?= htmlspecialchars($contato['telefone']) ?></td>
            <td>
                <a href="editar.php?id=<?= $contato['id'] ?>">Editar</a> |
                <a href="#" onclick="return confirmDelete(<?= $contato['id'] ?>)">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function confirmDelete(id) {
    if(confirm('Deseja realmente excluir este contato?')) {
        window.location.href = 'excluir.php?id=' + id;
    }
}
</script>

</body>
</html>
