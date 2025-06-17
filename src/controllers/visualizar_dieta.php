<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (
    !isset($_SESSION['usuario_id'], $_SESSION['dados'], $_SESSION['refeicoes_dia']) ||
    empty($_SESSION['refeicoes_dia'])
) {
    header('Location: /dashboard');
    exit;
}

$nome       = $_SESSION['dados']['nome'] ?? 'Usuário';
$refeicoes  = $_SESSION['refeicoes_dia'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Minha Dieta | NutriFácil</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper" style="background:#f5f5f5;">

  <div style="max-width: 700px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 0 12px rgba(0,0,0,0.1);">
    <h2 style="text-align:center;">🥗 Dieta de <strong><?= htmlspecialchars($nome) ?></strong></h2>
    <hr style="margin:20px 0;">

    <?php foreach ($refeicoes as $ref): ?>
      <div style="margin-bottom: 25px;">
        <h3 style="color:#2b7a2b;margin-bottom:8px;"><?= htmlspecialchars($ref['titulo']) ?></h3>
        <ul style="padding-left: 18px;">
          <?php foreach ($ref['alimentos'] as $item): ?>
            <li>
              <?= htmlspecialchars($item['nome']) ?>
              <?php if (isset($item['gramas'])): ?>
                (<?= htmlspecialchars($item['gramas']) ?>g)
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>

    <div style="text-align:center;margin-top:30px;">
      <a href="/dashboard" style="color:#007bff;text-decoration:none;">⬅ Voltar ao dashboard</a>
    </div>
  </div>

</body>
</html>
