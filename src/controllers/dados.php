<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: /login');
    exit;
}

require_once __DIR__ . '/../config.php';
$pdo = db_connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $peso      = floatval($_POST['peso']);
    $altura    = intval($_POST['altura']);
    $idade     = intval($_POST['idade']);
    $sexo      = $_POST['sexo'] ?? '';
    $atividade = floatval($_POST['atividade'] ?? 1.2);
    $objetivo  = $_POST['objetivo'] ?? '';
    $tempo     = intval($_POST['tempo']);
    $dieta     = $_POST['dieta'] ?? '';

    $preferencias = [
        'Proteínas'    => array_filter(array_map('trim', explode(',', $_POST['Proteínas'] ?? ''))),
        'Carboidratos' => array_filter(array_map('trim', explode(',', $_POST['Carboidratos'] ?? ''))),
        'Legumes'      => array_filter(array_map('trim', explode(',', $_POST['Legumes'] ?? ''))),
        'Verduras'     => array_filter(array_map('trim', explode(',', $_POST['Verduras'] ?? ''))),
        'Frutas'       => array_filter(array_map('trim', explode(',', $_POST['Frutas'] ?? '')))
    ];
    $alergias = $_POST['alergias'] ?? [];
    $outras_alergias = trim($_POST['outras_alergias'] ?? '');
    if (!empty($outras_alergias)) {
        $alergias[] = $outras_alergias;
    }

    $_SESSION['dados'] = [
        'nome'      => $_SESSION['usuario'],
        'peso'      => $peso,
        'altura'    => $altura,
        'idade'     => $idade,
        'sexo'      => $sexo,
        'atividade' => $atividade,
        'objetivo'  => $objetivo,
    ];
    $_SESSION['tempo']      = $tempo;
    $_SESSION['dieta']      = $dieta;
    $_SESSION['restricoes'] = array_merge($preferencias, [
        'alergias'  => $alergias,
        'refeicoes' => 4,
        'atividade' => $atividade,
    ]);

    try {
        $stmt = $pdo->prepare("INSERT INTO avaliacoes 
            (usuario_id, peso, altura, idade, sexo, atividade, objetivo, tempo_meta, dieta, preferencias, alergias)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $preferencias_completas = implode(',', array_merge(...array_values($preferencias)));

        $stmt->execute([
            $_SESSION['usuario_id'],
            $peso,
            $altura,
            $idade,
            $sexo,
            $atividade,
            $objetivo,
            $tempo,
            $dieta,
            $preferencias_completas,
            implode(',', $alergias),
        ]);

        header('Location: /gerar_dieta');
        exit;
    } catch (PDOException $e) {
        echo "<p style='color:red; text-align:center;'>Erro ao salvar avaliação: " . $e->getMessage() . "</p>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Avaliação Nutricional | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper" style="background:#f5f5f5;">
    <div style="max-width: 600px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #ccc;">
        <h2 style="text-align:center;margin-bottom:20px;">🥗 <span style="color:#2b7a2b;">Avaliação Nutricional</span></h2>
        <form method="post">
            <select name="dieta" required style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:5px;">
                <option value="">-- Tipo de Dieta --</option>
                <option value="Mediterrânea">Mediterrânea: azeite de oliva, peixes, grãos integrais, legumes e frutas.</option>
                <option value="Low Carb">Low Carb: redução de carboidratos, aumento de proteínas e gorduras boas.</option>
                <option value="Cetogênica">Cetogênica: muito baixa em carboidratos e alta em gorduras.</option>
                <option value="Vegetariana">Vegetariana: sem carnes; inclui ovos, laticínios e leguminosas.</option>
            </select>

            <input type="number" name="peso" placeholder="Peso (kg)" step="0.1" required style="width:100%;margin-bottom:8px;">
            <input type="number" name="altura" placeholder="Altura (cm)" required style="width:100%;margin-bottom:8px;">
            <input type="number" name="idade" placeholder="Idade (anos)" required style="width:100%;margin-bottom:8px;">

            <div style="margin:15px 0;">
                <label><input type="radio" name="sexo" value="masculino" required> Masculino</label><br>
                <label><input type="radio" name="sexo" value="feminino" required> Feminino</label>
            </div>

            <select name="objetivo" required style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:5px;">
                <option value="">-- Objetivo --</option>
                <option value="emagrecimento">Emagrecimento</option>
                <option value="hipertrofia">Hipertrofia</option>
            </select>

            <select name="atividade" required style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:5px;">
                <option value="">-- Nível de Atividade Física --</option>
                <option value="1.2">Sedentário (Pouco ou nenhum exercício)</option>
                <option value="1.375">Levemente ativo (1-3 dias/semana)</option>
                <option value="1.55">Moderadamente ativo (3-5 dias/semana)</option>
                <option value="1.725">Muito ativo (6-7 dias/semana)</option>
                <option value="1.9">Extremamente ativo (exercício intenso diário)</option>
            </select>

            <input type="number" name="tempo" placeholder='Tempo da Meta (em meses)' min="1" required style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:5px;">

            <p><strong>🍽️ Preferência de Alimentos:</strong> <small>(Separe por vírgula)</small></p>
            <input type="text" name="Proteínas" placeholder="Proteínas" style="width:100%;margin-bottom:8px;"><br>
            <input type="text" name="Carboidratos" placeholder="Carboidratos" style="width:100%;margin-bottom:8px;"><br>
            <input type="text" name="Legumes" placeholder="Legumes" style="width:100%;margin-bottom:8px;"><br>
            <input type="text" name="Verduras" placeholder="Verduras" style="width:100%;margin-bottom:8px;"><br>
            <input type="text" name="Frutas" placeholder="Frutas" style="width:100%;margin-bottom:8px;"><br>

            <p><strong>⚠️ Alergias/Intolerâncias:</strong></p>
            <?php
            $alergias = ['Lactose', 'Glúten', 'Proteína do leite', 'Ovo', 'Frutos do mar', 'Soja', 'Oleaginosa', 'Nenhuma'];
            foreach ($alergias as $item) {
                echo "<label><input type='checkbox' name='alergias[]' value='" . htmlspecialchars($item) . "'> " . htmlspecialchars($item) . "</label><br>";
            }
            ?>
            <input type="text" name="outras_alergias" placeholder="Outras alergias ou problemas de saúde" style="width:100%;margin-top:10px;margin-bottom:15px;padding:10px;border:1px solid #ccc;border-radius:5px;">

            <button type="submit" class="btn-calcular" style="margin-top:20px;width:100%;padding:12px;background:#2b7a2b;color:white;border:none;border-radius:5px;font-weight:bold;">
                Gerar Dieta
            </button>
        </form>
        <div style="text-align:center;margin-top:20px;">
            <a href="/dashboard" style="color:#2b7a2b;text-decoration:none;">⬅ Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
