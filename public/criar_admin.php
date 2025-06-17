<?php
require_once __DIR__ . '/../src/config.php';
$pdo = db_connect();

$email = 'admin@nutrifacil.com';

// Verifica se o e-mail já existe
$stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$existe = $stmt->fetchColumn();

if ($existe) {
    echo "Usuário já existe.";
    exit;
}

// Cria novo admin
$nome = 'Admin';
$senha = password_hash('123456', PASSWORD_DEFAULT);
$is_admin = 1;

$stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, is_admin) VALUES (?, ?, ?, ?)");
$stmt->execute([$nome, $email, $senha, $is_admin]);

echo "Usuário admin criado com sucesso!";
