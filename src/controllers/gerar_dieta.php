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

$nome      = $_SESSION['dados']['nome'];
$objetivo  = $_SESSION['dados']['objetivo'];
$sexo      = $_SESSION['dados']['sexo'];
$peso      = $_SESSION['dados']['peso'];
$altura    = $_SESSION['dados']['altura'];
$idade     = $_SESSION['dados']['idade'];
$atividade = isset($_SESSION['dados']['atividade']) ? floatval($_SESSION['dados']['atividade']) : 1.2;

$alergias_array = $_SESSION['restricoes']['alergias'] ?? [];
$alergias_texto = empty($alergias_array) ? 'Nenhuma' : implode(', ', $alergias_array);
$refeicoes_por_dia = $_SESSION['restricoes']['refeicoes'] ?? 4;
$preferencias = $_SESSION['restricoes']['preferencias'] ?? [];

$bmr = ($sexo === 'masculino')
    ? 10 * $peso + 6.25 * $altura - 5 * $idade + 5
    : 10 * $peso + 6.25 * $altura - 5 * $idade - 161;
$tdee = $bmr * $atividade;

$targetCalories = match ($objetivo) {
    'emagrecimento' => max(1200, $tdee - 500),
    'hipertrofia'   => $tdee + 500,
    default         => $tdee
};

$meals = [
    'Café da Manhã'   => 0.25,
    'Almoço'          => 0.35,
    'Lanche da Tarde' => 0.15,
    'Jantar'          => 0.25,
];

$prioridadePorRefeicao = [
    'Café da Manhã' => ['CarboidratoPrioritario', 'Frutas', 'Proteína Animal', 'Proteína Vegetariana', 'Gordura Boa'],
    'Lanche da Tarde' => ['Frutas', 'CarboidratoPrioritario', 'Proteína Animal', 'Proteína Vegetariana', 'Gordura Boa'],
    'Almoço' => ['Proteína Animal', 'Proteína Vegetariana', 'Carboidrato', 'Legumes', 'Verduras', 'Gordura Boa'],
    'Jantar' => ['Proteína Animal', 'Proteína Vegetariana', 'Carboidrato', 'Legumes', 'Verduras', 'Gordura Boa'],
];

$maxItensPorRefeicao = [
    'Café da Manhã' => 4,
    'Almoço' => 5,
    'Lanche da Tarde' => 3,
    'Jantar' => 4,
];

$dietMap = [
    'Mediterrânea' => ['Proteína Animal','Carboidrato','Legumes','Verduras','Frutas', 'Gordura Boa'],
    'Low Carb'     => ['Proteína Animal','Legumes','Verduras', 'Gordura Boa'],
    'Cetogênica'   => ['Proteína Animal','Verduras', 'Gordura Boa'],
    'Vegetariana'  => ['Proteína Vegetariana','Carboidrato','Legumes','Verduras','Frutas', 'Gordura Boa'],
];

$chosenDiet = $_SESSION['dieta'] ?? 'Mediterrânea';
$allowedByDiet = $dietMap[$chosenDiet] ?? $dietMap['Mediterrânea'];

$refeicoes_dia = [];

foreach ($meals as $titulo => $pct) {
    $calRefeicao = $targetCalories * $pct;
    $calPorItem = $calRefeicao / $maxItensPorRefeicao[$titulo];
    $lista = [];
    $itensAdicionados = 0;

    foreach ($prioridadePorRefeicao[$titulo] as $cat) {
        if ($itensAdicionados >= $maxItensPorRefeicao[$titulo]) break;

        $whereAlergia = "";
        $params = [];

        if (!empty($alergias_array)) {
            $whereAlergiaParts = [];
            foreach ($alergias_array as $alergia) {
                $whereAlergiaParts[] = " (alergias IS NULL OR alergias NOT LIKE ?) ";
                $params[] = "%$alergia%";
            }
            $whereAlergia = " AND " . implode(" AND ", $whereAlergiaParts);
        }

        if ($cat === 'CarboidratoPrioritario') {
            $sql = "
                SELECT nome, calorias
                FROM alimentos
                WHERE categoria = 'Carboidrato'
                  AND (nome LIKE '%Pão%' OR nome LIKE '%Aveia%')
                  $whereAlergia
                ORDER BY ABS(calorias - ?)
                LIMIT 1
            ";
            $params[] = $calPorItem;
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);

        } elseif ($cat === 'Proteína Animal' && $chosenDiet !== 'Vegetariana') {
            if (in_array($titulo, ['Café da Manhã', 'Lanche da Tarde'])) {
                $sql = "
                    SELECT nome, calorias
                    FROM alimentos
                    WHERE categoria = 'Proteína Animal'
                      AND (
                          nome LIKE '%Frango%' OR 
                          nome LIKE '%Atum%' OR 
                          nome LIKE '%Ovo%'
                      )
                      $whereAlergia
                    ORDER BY ABS(calorias - ?)
                    LIMIT 1
                ";
                $params[] = $calPorItem;
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
            } else {
                $sql = "
                    SELECT nome, calorias
                    FROM alimentos
                    WHERE categoria = ?
                      $whereAlergia
                    ORDER BY ABS(calorias - ?)
                    LIMIT 1
                ";
                $params = array_merge([$cat], $params, [$calPorItem]);
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
            }
        } else {
            if (!in_array($cat, $allowedByDiet)) continue;

            if (!empty($preferencias[$cat])) {
                $placeholders = implode(',', array_fill(0, count($preferencias[$cat]), '?'));
                $sql = "
                    SELECT nome, calorias
                    FROM alimentos
                    WHERE categoria = ?
                      AND nome IN ($placeholders)
                      $whereAlergia
                    ORDER BY ABS(calorias - ?)
                    LIMIT 1
                ";
                $params = array_merge([$cat], $preferencias[$cat], $params, [$calPorItem]);
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
            } else {
                $sql = "
                    SELECT nome, calorias
                    FROM alimentos
                    WHERE categoria = ?
                      $whereAlergia
                    ORDER BY ABS(calorias - ?)
                    LIMIT 1
                ";
                $params = array_merge([$cat], $params, [$calPorItem]);
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
            }
        }

        $f = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($f) {
            $cal100 = max(1, $f['calorias']);
            $g = round($calPorItem / $cal100 * 100);
            $g = max(10, min(150, $g));
            $lista[] = ['nome' => $f['nome'], 'gramas' => $g];
            $itensAdicionados++;
        }
    }

    $refeicoes_dia[] = [
        'titulo' => $titulo,
        'alimentos' => $lista
    ];
}

$_SESSION['refeicoes_dia'] = $refeicoes_dia;
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
    <div style="font-size: 15px; line-height: 1.8;">
      <p><strong>📖 Dieta:</strong> <?php echo htmlspecialchars($chosenDiet) ?></p>
      <p><strong>🎯 Objetivo:</strong> <?php echo htmlspecialchars($objetivo) ?></p>
      <p><strong>🧍‍♂️ Sexo:</strong> <?php echo htmlspecialchars(ucfirst($sexo)) ?></p>
      <p><strong>⏱ Tempo para a meta:</strong> <?php echo htmlspecialchars($_SESSION['tempo']) ?> meses</p>
      <p><strong>⚠️ Alergias/Intolerâncias:</strong> <?php echo htmlspecialchars($alergias_texto) ?></p>
      <p><strong>📅 Refeições por dia:</strong> <?php echo htmlspecialchars($refeicoes_por_dia) ?></p>
    </div>
    <hr style="margin:20px 0;">

    <?php foreach ($refeicoes_dia as $ref): ?>
      <div style="margin-bottom: 25px;">
        <h3 style="color:#2b7a2b;margin-bottom:8px;">
          <?php echo htmlspecialchars($ref['titulo']) ?>
        </h3>
        <ul style="padding-left: 18px;">
          <?php if (empty($ref['alimentos'])): ?>
            <li><em>Sem itens disponíveis nesta categoria</em></li>
          <?php else: ?>
            <?php foreach ($ref['alimentos'] as $item): ?>
              <li>
                <?php echo htmlspecialchars($item['nome']) ?>
                (<?php echo $item['gramas'] ?>g)
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
    <?php endforeach; ?>

    <div style="text-align:center; margin-top:30px;">
      <a href="/pagamento" style="background:#2b7a2b;color:white;padding:12px 25px;border-radius:6px;text-decoration:none;font-weight:bold;">
        💳 Avançar para Pagamento
      </a><br><br>
      <a href="/dashboard" style="color:#555;text-decoration:none;">⬅ Voltar ao Início</a>
    </div>
  </div>
</body>
</html>