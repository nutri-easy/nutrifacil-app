<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: /login");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['plano'])) {
    $plano = $_POST['plano'];
    // Você pode armazenar na sessão se desejar
    $_SESSION['plano_escolhido'] = $plano;
    header("Location: /pagamento_opcoes.php?plano=" . urlencode($plano));
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Escolha do Plano | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        body {
            background: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2b7a2b;
        }
        .plano {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            background: #fafafa;
        }
        .plano h3 {
            margin: 10px 0;
            color: #333;
        }
        .plano p {
            font-size: 16px;
            color: #666;
        }
        .plano button {
            padding: 10px 20px;
            background: #2b7a2b;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }
        .plano button:hover {
            background: #256b25;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Escolha seu Plano</h2>

        <form method="post">
            <div class="plano">
                <h3>Plano Mensal - R$20,00</h3>
                <p>Acesso por 30 dias ao plano alimentar completo.</p>
                <button type="submit" name="plano" value="mensal">Selecionar Mensal</button>
            </div>

            <div class="plano">
                <h3>Plano Semestral - R$100,00</h3>
                <p>Acesso por 6 meses com benefícios exclusivos.</p>
                <button type="submit" name="plano" value="semestral">Selecionar Semestral</button>
            </div>

            <div class="plano">
                <h3>Plano Anual - R$180,00</h3>
                <p>Acesso por 12 meses com suporte personalizado.</p>
                <button type="submit" name="plano" value="anual">Selecionar Anual</button>
            </div>
        </form>

        <div style="text-align:center; margin-top:20px;">
            <a href="/dashboard" style="color:#007bff; text-decoration:none;">⬅ Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
