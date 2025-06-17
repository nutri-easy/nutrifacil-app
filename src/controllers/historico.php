<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: /login');
    exit;
}

require_once __DIR__ . '/../config.php';
$pdo = db_connect();

$stmt = $pdo->prepare("SELECT * FROM avaliacoes WHERE usuario_id = ? ORDER BY id DESC");
$stmt->execute([$_SESSION['usuario_id']]);
$avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Avaliações</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        body {
            background: #f0f4f8;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.08);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2b7a2b;
        }
        .card {
            background: #f9f9f9;
            border-left: 5px solid #2b7a2b;
            margin-bottom: 15px;
            padding: 15px 20px;
            border-radius: 8px;
        }
        .card p {
            margin: 5px 0;
        }
        .back-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            background: #2b7a2b;
            color: white;
            padding: 12px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📊 Histórico de Avaliações</h2>

    <?php if (empty($avaliacoes)): ?>
        <p style="text-align:center;color:#777;">Nenhuma avaliação encontrada.</p>
    <?php else: ?>
        <?php foreach ($avaliacoes as $a): ?>
            <div class="card">
                <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($a['created_at'])) ?></p>
                <p><strong>Peso:</strong> <?= $a['peso'] ?> kg</p>
                <p><strong>Altura:</strong> <?= $a['altura'] ?> cm</p>
                <p><strong>Idade:</strong> <?= $a['idade'] ?> anos</p>
                <p><strong>Sexo:</strong> <?= ucfirst($a['sexo']) ?></p>
                <p><strong>Objetivo:</strong> <?= ucfirst($a['objetivo']) ?></p>
                <p><strong>Tempo de meta:</strong> <?= $a['tempo_meta'] ?> mês(es)</p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <a href="/dashboard" class="back-btn">⬅ Voltar ao Início</a>
</div>

</body>
</html>
