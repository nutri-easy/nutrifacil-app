<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (
    !isset($_SESSION['dados'], $_SESSION['dieta'], $_SESSION['refeicoes_dia']) ||
    empty($_SESSION['refeicoes_dia'])
) {
    header("Location: /dashboard");
    exit;
}

$nome = $_SESSION['dados']['nome'] ?? 'Usuário';
$dieta = ucfirst($_SESSION['dieta'] ?? 'Desconhecida');
$refeicoes = $_SESSION['refeicoes_dia'] ?? [];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Pagamento | NutriFácil</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper" style="background:#f5f5f5;">

  <div style="max-width: 700px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 0 12px rgba(0,0,0,0.1);">
    <h2 style="text-align:center;">💳 Pagamento do Plano</h2>

    <p><strong>📋 Dieta Escolhida:</strong> <?= htmlspecialchars($dieta) ?></p>

    <h3 style="margin-top:25px;">📘 Plano Alimentar Gerado:</h3>

    <?php foreach ($refeicoes as $ref): ?>
      <div style="margin-top:15px;">
        <h4 style="color:#2b7a2b;"><?= htmlspecialchars($ref['titulo']) ?></h4>
        <ul style="padding-left:20px;">
          <?php foreach ($ref['alimentos'] as $alimento): ?>
            <li>
              <?= htmlspecialchars($alimento['nome']) ?>
              (<?= htmlspecialchars($alimento['gramas']) ?>g)
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>

    <hr style="margin:30px 0;">

    <p style="text-align:center;font-size:16px;">
      Para liberar o download e envio do plano completo, conclua o pagamento:
    </p>

    <div style="text-align:center;margin:20px 0;">
      <a href="/pagamento_opcoes.php"
         style="display:inline-block;padding:12px 25px;background:#4CAF50;color:white;font-weight:bold;border-radius:6px;text-decoration:none;">
         🔗 Acessar Link de Pagamento
      </a>
    </div>
    <div style="text-align:center;margin-top:25px;">
      <a href="/dashboard" style="color:#007bff;text-decoration:none;">⬅ Voltar ao Painel</a>
    </div>
  </div>

</body>
</html>
