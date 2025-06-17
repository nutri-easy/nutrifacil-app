<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config.php';
$pdo = db_connect();

// ==== 0) Preenchemos algumas variáveis para não termos warnings ====
$nome            = $_SESSION['usuario']               ?? 'Usuário';
$atividade       = $_SESSION['dados']['atividade']    ?? 1.2;
$envio_realizado = $_SESSION['envio_realizado']       ?? false;
$envio_tipo      = $_SESSION['envio_tipo']            ?? '';

// ==== 1) Se não temos $_SESSION['dados'], tentamos buscar do banco a última avaliação ====
if (!isset($_SESSION['dados']) && isset($_SESSION['usuario_id'])) {
    $stmt = $pdo->prepare("
      SELECT peso, altura, idade, sexo, atividade
      FROM avaliacoes
      WHERE usuario_id = ?
      ORDER BY id DESC
      LIMIT 1
    ");
    $stmt->execute([ $_SESSION['usuario_id'] ]);
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['dados'] = [
            'peso'      => $row['peso'],
            'altura'    => $row['altura'],
            'idade'     => $row['idade'],
            'sexo'      => $row['sexo'],
            'atividade' => $row['atividade'],
        ];
        $atividade = floatval($row['atividade']);
    }
}

// ==== 2) Valores padrão ====
$imc       = null;
$tmb       = null;
$classImc  = 'N/A';
$aguaRecom = 'N/A';

// ==== 3) Se tivermos dados na sessão, realizamos os cálculos ====
if (isset($_SESSION['dados'])) {
    extract($_SESSION['dados']); // traz $peso, $altura, $idade, $sexo, $atividade

    // IMC
    $imc = $peso / (($altura/100) ** 2);

    // TMB (Mifflin-St Jeor)
    if ($sexo === 'masculino') {
        $bmr = 10 * $peso + 6.25 * $altura - 5 * $idade + 5;
    } else {
        $bmr = 10 * $peso + 6.25 * $altura - 5 * $idade - 161;
    }
    $tmb = $bmr * $atividade;

    // Classificação
    if ($imc < 18.5) {
        $classImc = 'Abaixo do peso';
    } elseif ($imc < 25) {
        $classImc = 'Peso normal';
    } elseif ($imc < 30) {
        $classImc = 'Sobrepeso';
    } else {
        $classImc = 'Obesidade';
    }

    // Água recomendada (ml/dia)
    $aguaRecom = round($peso * 35);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | NutriFácil</title>
  <link rel="stylesheet" href="/css/style.css">
  <style>
    .btn {
      display: block;
      margin: 8px 0;
      padding: 12px;
      background: #e8f0fe;
      color: #000;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
    }
    .btn:hover {
      background: #cde0ff;
    }
    .info-box {
      margin-top: 15px;
      padding: 10px;
      background: #e0ffe0;
      border: 1px solid #6c6;
      border-radius: 5px;
    }
  </style>
</head>
<body class="login-wrapper" style="padding:20px;">
  <div style="max-width:500px;margin:0 auto;background:#fff;padding:30px;border-radius:8px;box-shadow:0 0 10px #ccc;text-align:center;">
    <h2>Dashboard</h2>
    <p>Olá, <strong><?= htmlspecialchars($nome) ?></strong>! Bem-vindo ao seu painel.</p>

    <p>💡 IMC: 
      <strong>
        <?= is_null($imc) ? 'N/A' : number_format($imc, 1) ?>
      </strong>
    </p>

    <p>🔥 TMB: 
      <strong>
        <?= is_null($tmb) ? 'N/A' : round($tmb) ?> kcal/dia
      </strong>
    </p>

    <p>📊 Classificação IMC: 
      <strong><?= htmlspecialchars($classImc) ?></strong>
    </p>

    <p>💧 Água recomendada: 
      <strong><?= htmlspecialchars($aguaRecom) ?> ml/dia</strong>
    </p>

    <?php if ($envio_realizado): ?>
      <div class="info-box">
        ✅ Sua dieta foi enviada via <strong><?= htmlspecialchars(ucfirst($envio_tipo)) ?></strong>.
      </div>
    <?php endif; ?>

    <a href="/refazer" class="btn">🔁 Refazer Avaliação</a>
    <a href="/resumo_dados" class="btn">📄 Resumo Avaliação</a>
    <a href="/visualizar_dieta" class="btn">📄 Visualizar Dieta</a>
    <a href="/historico" class="btn">🗓 Histórico de Avaliações</a>
    <a href="/receitas" class="btn">🥗 Receitas</a>
    <a href="/conteudos" class="btn">📚 Conteúdos Extras</a>
    <a href="/suporte" class="btn">💬 Suporte</a>
    <a href="/logout" class="btn" style="background:#ffeaea;color:#c00;">🔒 Sair</a>
  </div>
</body>
</html>
