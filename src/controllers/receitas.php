<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
    exit;
}

// Simulação de receitas
$receitas = [
    ['titulo' => 'Salada Mediterrânea', 'descricao' => 'Folhas verdes, tomate, pepino e azeite de oliva extra virgem.'],
    ['titulo' => 'Omelete de Espinafre', 'descricao' => 'Ovos, espinafre e cebola salteados no azeite.'],
    ['titulo' => 'Peito de Frango com Batata Doce', 'descricao' => 'Frango grelhado com batata doce cozida.'],
    ['titulo' => 'Smoothie de Frutas Vermelhas', 'descricao' => 'Banana, morango, aveia e leite vegetal.']
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Receitas | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper">
    <div style="max-width: 500px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
        <h2 style="text-align:center;">🥗 Receitas Saudáveis</h2>

        <?php foreach ($receitas as $r): ?>
            <div style="margin-bottom:20px;padding:15px;border:1px solid #ddd;border-radius:8px;background:#f9f9f9;">
                <h4 style="margin-bottom:5px;"><?= htmlspecialchars($r['titulo']) ?></h4>
                <p style="margin:0;color:#555;"><?= htmlspecialchars($r['descricao']) ?></p>
            </div>
        <?php endforeach; ?>

        <div style="text-align:center;margin-top:20px;">
            <a href="/dashboard" style="background:#2b7a2b;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;">⬅ Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
