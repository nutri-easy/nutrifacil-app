<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Se não estiver logado, redireciona
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /login');
    exit;
}

// Garante que temos dados de avaliação na sessão
if (!isset($_SESSION['dados'])) {
    header('Location: /dashboard');
    exit;
}

// Puxa tudo da sessão
$nome        = $_SESSION['usuario']                 ?? 'Usuário';
$dados       = $_SESSION['dados'];
$restricoes  = $_SESSION['restricoes']              ?? [];
$tempo_meta  = $_SESSION['tempo']                   ?? 'N/A';
$dieta       = $_SESSION['dieta']                   ?? 'N/A';

// Extrai detalhes
$peso     = $dados['peso']     ?? 'N/A';
$altura   = $dados['altura']   ?? 'N/A';
$idade    = $dados['idade']    ?? 'N/A';
$sexo     = ucfirst($dados['sexo'] ?? '');
$objetivo = ucfirst($dados['objetivo'] ?? '');

// Alérgias/texto
$alergias = $restricoes['alergias'] ?? [];
$alergias_texto = empty($alergias)
    ? 'Nenhuma'
    : implode(', ', $alergias);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Resumo da Avaliação | NutriFácil</title>
  <link rel="stylesheet" href="/css/style.css">
  <style>
    body { background: #f5f5f5; font-family: sans-serif; }
    .card {
      max-width: 500px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
      text-align: center;
    }
    .card h2 { margin-bottom: 20px; }
    .card p { margin: 8px 0; font-size: 15px; }
    .btn-back {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 20px;
      background: #2b7a2b;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>📋 Resumo da Avaliação</h2>

    <p>👤 <strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
    <p>🎯 <strong>Objetivo:</strong> <?= htmlspecialchars($objetivo) ?></p>
    <p>⚖️ <strong>Peso:</strong> <?= htmlspecialchars($peso) ?> kg</p>
    <p>📏 <strong>Altura:</strong> <?= htmlspecialchars($altura) ?> cm</p>
    <p>🎂 <strong>Idade:</strong> <?= htmlspecialchars($idade) ?> anos</p>
    <p>🚻 <strong>Sexo:</strong> <?= htmlspecialchars($sexo) ?></p>
    <p>⏱️ <strong>Tempo para a meta:</strong> <?= htmlspecialchars($tempo_meta) ?> meses</p>
    <p>🥗 <strong>Dieta:</strong> <?= htmlspecialchars($dieta) ?></p>
    <p>⚠️ <strong>Alergias/Intolerâncias:</strong> <?= htmlspecialchars($alergias_texto) ?></p>

    <a href="/dashboard" class="btn-back">← Voltar ao Dashboard</a>
  </div>
</body>
</html>
