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
        h2, h3 { color: #333; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .form-cadastro input { margin: 5px 0; padding: 5px; }
        .form-cadastro button { padding: 5px 10px; }
    </style>
</head>
<body>

<h2>Minha Agenda de Contatos</h2>

<form action="salvar.php" method="post" class="form-cadastro">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="text" name="telefone" placeholder="Telefone" required>
    <button type="submit">Cadastrar</button>
</form>

<h3>Contatos</h3>

<table>
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($contatos as $contato): ?>
    <tr>
        <td><?= htmlspecialchars($contato['nome']) ?></td>
        <td><?= htmlspecialchars($contato['email']) ?></td>
        <td><?= htmlspecialchars($contato['telefone']) ?></td>
        <td>
            <a href="editar.php?id=<?= $contato['id'] ?>">Editar</a> |
            <a href="#" onclick="if(confirm('Deseja realmente excluir?')) window.location='excluir.php?id=<?= $contato['id'] ?>';">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
