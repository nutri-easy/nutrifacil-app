<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['dados'], $_SESSION['dieta'], $_SESSION['refeicoes_dia'])) {
    header("Location: /dashboard");
    exit;
}

$dados = $_SESSION['dados'];
$dieta = ucfirst($_SESSION['dieta']);
$tempoMeta = $_SESSION['tempo'];
$restricoes = $_SESSION['restricoes']['restricoes_alimentos'] ?? [];
$alergias = $_SESSION['restricoes']['alergias'] ?? [];
$refeicoes = $_SESSION['restricoes']['refeicoes'] ?? 3;
$refeicoes_dia = $_SESSION['refeicoes_dia'];

$alergias_texto = empty($alergias) ? 'Nenhuma' : implode(', ', $alergias);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Plano Alimentar | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .card {
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        .card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2b7a2b;
        }
        .info {
            font-size: 16px;
            margin-bottom: 8px;
        }
        .info strong {
            color: #333;
        }
        .refeicao {
            margin-top: 20px;
        }
        .refeicao h4 {
            color: #2b7a2b;
            margin-bottom: 5px;
        }
        ul {
            padding-left: 20px;
            margin: 0;
        }
        ul li {
            margin-bottom: 4px;
        }
        .btn-container {
            margin-top: 30px;
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px 5px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            background-color: #2b7a2b;
            transition: 0.3s;
        }
        .btn:hover {
            background-color: #256d25;
        }
        .btn-back {
            background: #ccc;
            color: #333;
        }
        .btn-back:hover {
            background: #bbb;
        }
    </style>
</head>
<body class="login-wrapper">

<div class="card">
    <h2>🍽️ Dieta Gerada para <?= htmlspecialchars($dados['nome']) ?></h2>

    <p class="info"><strong>Dieta:</strong> <?= htmlspecialchars($dieta) ?></p>
    <p class="info"><strong>Objetivo:</strong> <?= htmlspecialchars($dados['objetivo']) ?></p>
    <p class="info"><strong>Sexo:</strong> <?= htmlspecialchars(ucfirst($dados['sexo'])) ?></p>
    <p class="info"><strong>Tempo de meta:</strong> <?= $tempoMeta ?> meses</p>
    <p class="info"><strong>Preferências:</strong> <?= htmlspecialchars(implode(', ', $restricoes)) ?></p>
    <p class="info"><strong>Alergias/Intolerâncias:</strong> <?= htmlspecialchars($alergias_texto) ?></p>
    <p class="info"><strong>Refeições por dia:</strong> <?= $refeicoes ?></p>

    <hr style="margin:20px 0;">

    <?php foreach ($refeicoes_dia as $ref): ?>
        <div class="refeicao">
            <h4><?= htmlspecialchars($ref['titulo']) ?></h4>
            <ul>
                <?php foreach ($ref['alimentos'] as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>

    <div class="btn-container">
        <a href="/pagamento" class="btn">💳 Avançar para Pagamento</a>
        <a href="/dashboard" class="btn btn-back">⬅ Voltar ao Painel</a>
    </div>
</div>

</body>
</html>
