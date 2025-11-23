<?php
require 'conexao.php';

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$id = $_POST['id'] ?? null;

if ($id) {
    $stmt = $conexao->prepare("UPDATE contatos SET nome = ?, email = ?, telefone = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $telefone, $id]);
} else {
    $stmt = $conexao->prepare("INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $telefone]);
}

header("Location: index.php");
exit;
