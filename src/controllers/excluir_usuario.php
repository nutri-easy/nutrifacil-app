<?php
session_start();
require_once __DIR__ . '/../config.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
    exit;
}

if (isset($_GET['id'])) {
    if ($_SESSION['usuario_id'] == $_GET['id']) {
        die("⚠️ Você não pode excluir a si mesmo.");
    }

    $pdo = db_connect();
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header('Location: /admin');
exit;
?>