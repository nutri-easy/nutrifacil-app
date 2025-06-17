<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: /dashboard");
    exit;
}

require_once __DIR__ . '/../config.php';
$pdo = db_connect();

// Exibe usuários para edição
$stmt = $pdo->query("SELECT id, nome, email FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2 style="text-align:center;">👨‍⚕️ Painel Administrativo</h2>
<div style="max-width:700px;margin:auto;padding:20px;background:white;border-radius:10px;box-shadow:0 0 10px #ccc;">
    <h3>Usuários cadastrados</h3>
    <ul>
        <?php foreach ($usuarios as $user): ?>
            <li>
                <?= htmlspecialchars($user['nome']) ?> (<?= $user['email'] ?>)
                <a href="/editar_usuario.php?id=<?= $user['id'] ?>">✏️ Editar Treinos/Conteúdos</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
