<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../config.php';

if (!isset($_SESSION['usuario']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: /login');
    exit;
}

$pdo = db_connect();
$usuarios = $pdo->query("SELECT id, nome, email FROM usuarios")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Admin | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper">
    <div class="login-box" style="max-width:800px;margin:auto;background:#fff;padding:25px;border-radius:10px;box-shadow:0 0 10px #ccc;">
        <h2 style="text-align:center;">🔧 Administração de Usuários</h2>
        <table border="1" cellpadding="8" cellspacing="0" style="width:100%;border-collapse:collapse;margin-top:20px;">
            <thead style="background:#f0f0f0;">
                <tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['nome']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td>
                        <a href="/editar_usuario?id=<?= $user['id'] ?>">✏️ Editar</a> |
                        <a href="/excluir_usuario?id=<?= $user['id'] ?>" onclick="return confirm('Excluir usuário?')">🗑️ Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</body>
</html>
