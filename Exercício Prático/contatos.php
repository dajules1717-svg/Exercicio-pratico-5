<?php
try {
    $conexao = new PDO("sqlite:" . __DIR__ . "/agenda.db");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
    CREATE TABLE IF NOT EXISTS contatos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        email TEXT,
        telefone TEXT
    )";

    $conexao->exec($sql);
} catch (PDOException $e) {
    echo "Erro ao conectar ou criar tabela: " . $e->getMessage();
}
?>
