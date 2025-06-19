<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (
    !isset($_SESSION['usuario_id']) ||
    !isset($_SESSION['dados']) ||
    !isset($_SESSION['restricoes']) ||
    !isset($_SESSION['tempo'])
) {
    header("Location: /dados");
    exit;
}

require_once __DIR__ . '/../config.php';
$pdo = db_connect();

$nome = $_SESSION['dados']['nome'] ?? 'Usuário';
$objetivo = $_SESSION['dados']['objetivo'] ?? '';
$sexo = $_SESSION['dados']['sexo'] ?? '';
$peso = $_SESSION['dados']['peso'] ?? 0;
$altura = $_SESSION['dados']['altura'] ?? 0;
$idade = $_SESSION['dados']['idade'] ?? 0;
$atividade = isset($_SESSION['dados']['atividade']) ? floatval($_SESSION['dados']['atividade']) : 1.2;

$alergias_array = $_SESSION['restricoes']['alergias'] ?? [];
$alergias_texto = empty($alergias_array) ? 'Nenhuma' : implode(', ', $alergias_array);
$refeicoes_por_dia = $_SESSION['restricoes']['refeicoes'] ?? 4;
$chosenDiet = $_SESSION['dieta'] ?? 'Mediterrânea';

// Assume que a lógica de geração da dieta já populou $_SESSION['refeicoes_dia']
$_SESSION['gerar_dieta'] = true;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Dieta Gerada | NutriFácil</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper" style="background:#f5f5f5;">
  <div style="max-width: 700px; margin: 40px auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 0 12px rgba(0,0,0,0.1);">
    <h2 style="text-align:center;margin-bottom:20px;">
      🥗 Dieta Gerada para <?php echo htmlspecialchars($nome) ?>
    </h2>
    <div style="font-size: 15px; line-height: 1.8; text-align:center;">
      <p><strong>📖 Dieta:</strong> <?php echo htmlspecialchars($chosenDiet) ?></p>
      <p><strong>🎯 Objetivo:</strong> <?php echo htmlspecialchars($objetivo) ?></p>
      <p><strong>🧍‍♂️ Sexo:</strong> <?php echo htmlspecialchars(ucfirst($sexo)) ?></p>
      <p><strong>⏱ Tempo para a meta:</strong> <?php echo htmlspecialchars($_SESSION['tempo']) ?> meses</p>
      <p><strong>⚠️ Alergias/Intolerâncias:</strong> <?php echo htmlspecialchars($alergias_texto) ?></p>
      <p><strong>📅 Refeições por dia:</strong> <?php echo htmlspecialchars($refeicoes_por_dia) ?></p>
      <p style="margin-top: 20px; font-weight: bold; color: #2b7a2b;">
        ✅ Sua dieta foi gerada com sucesso!
      </p>
      <p style="color: #555;">
        Para visualizar os detalhes da dieta, realize o pagamento do plano escolhido.
      </p>
    </div>

    <div style="text-align:center; margin-top:30px;">
      <a href="/planos" style="background:#2b7a2b;color:white;padding:12px 25px;border-radius:6px;text-decoration:none;font-weight:bold;">
        💳 Avançar para Pagamento
      </a><br><br>
      <a href="/dashboard" style="color:#555;text-decoration:none;">⬅ Voltar ao Início</a>
    </div>
  </div>
</body>
</html>
