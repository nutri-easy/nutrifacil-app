<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
    exit;
}

// Conteúdos extras simulados
$conteudos = [
    ['titulo' => 'Benefícios da Hidratação', 'descricao' => 'Entenda a importância de beber água e como calcular a quantidade ideal por dia.'],
    ['titulo' => 'Dicas para Emagrecer com Saúde', 'descricao' => 'Veja estratégias nutricionais seguras para perder peso de forma eficaz.'],
    ['titulo' => 'Alimentos Termogênicos', 'descricao' => 'Conheça os alimentos que aceleram o metabolismo e ajudam na queima de gordura.'],
    ['titulo' => 'Planejamento de Refeições', 'descricao' => 'Como montar um cardápio semanal equilibrado e funcional.']
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Conteúdos Extras | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper">
    <div style="max-width: 500px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
        <h2 style="text-align:center;">📚 Conteúdos Extras</h2>

        <?php foreach ($conteudos as $c): ?>
            <div style="margin-bottom:20px;padding:15px;border:1px solid #ddd;border-radius:8px;background:#f9f9f9;">
                <h4 style="margin-bottom:5px;"><?= htmlspecialchars($c['titulo']) ?></h4>
                <p style="margin:0;color:#555;"><?= htmlspecialchars($c['descricao']) ?></p>
            </div>
        <?php endforeach; ?>

        <div style="text-align:center;margin-top:20px;">
            <a href="/dashboard" style="background:#2b7a2b;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;">⬅ Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
