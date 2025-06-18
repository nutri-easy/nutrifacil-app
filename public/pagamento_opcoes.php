<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: /login');
    exit;
}

require_once __DIR__ . '/../src/config.php';
$pdo = db_connect();

$nome = $_SESSION['dados']['nome'] ?? 'Usuário';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $forma = $_POST['forma_pagamento'] ?? '';

    if (in_array($forma, ['pix', 'cartao', 'boleto', 'simulado'])) {
        $stmt = $pdo->prepare("UPDATE pagamentos SET metodo = ?, status = 'confirmado' WHERE usuario_id = ? ORDER BY id DESC LIMIT 1");
        $stmt->execute([$forma, $_SESSION['usuario_id']]);

        $_SESSION['forma_pagamento'] = $forma;
        $_SESSION['pagamento_confirmado'] = true;

        header("Location: /envio_dieta");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formas de Pagamento | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper" style="background:#f5f5f5;">
    <div style="max-width: 700px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 0 12px rgba(0,0,0,0.1);">

        <h2 style="text-align:center;">💰 Formas de Pagamento</h2>
        <p style="text-align:center;">Escolha uma das opções para concluir sua compra:</p>

        <div style="margin-top: 30px;">
            <h3>📱 Pix</h3>
            <button type="button" onclick="mostrarPix()" style="background:#2b7a2b;color:white;padding:12px 20px;border:none;border-radius:6px;font-weight:bold;">
                Pagar com Pix
            </button>
            <div id="pix-container" style="display:none; text-align:center; margin-top:20px;">
                <p>Escaneie o QR Code abaixo para realizar o pagamento:</p>
                <img src="/img/qrcode-pix-simulado.png" alt="QR Code Pix" style="width:220px;">
                <p style="margin-top:10px;font-size:13px;color:#555;">Chave Pix: <strong>nutrifacil@pagamento.com</strong></p>
                <form method="post" style="margin-top:10px;">
                    <input type="hidden" name="forma_pagamento" value="pix">
                    <button type="submit" style="background:#2b7a2b;color:white;padding:10px 20px;border:none;border-radius:6px;font-weight:bold;">
                        Confirmar Pagamento Pix
                    </button>
                </form>
            </div>
        </div>

        <hr style="margin:40px 0;">

        <div>
            <h3>💳 Cartão de Crédito/Débito</h3>
            <form method="post" style="display:flex;flex-direction:column;gap:10px;">
                <input type="hidden" name="forma_pagamento" value="cartao">
                <input type="text" name="nome_cartao" placeholder="Nome no cartão" required>
                <input type="text" name="numero_cartao" placeholder="Número do cartão" required>
                <div style="display:flex;gap:10px;">
                    <input type="text" name="validade" placeholder="Validade (MM/AA)" required>
                    <input type="text" name="cvv" placeholder="CVV" required>
                </div>
                <button type="submit" style="background:#2b7a2b;color:white;padding:12px;border:none;border-radius:6px;font-weight:bold;">
                    Confirmar Pagamento com Cartão
                </button>
            </form>
        </div>

        <hr style="margin:40px 0;">

        <div>
            <h3>🧾 Boleto Bancário</h3>
            <p>Clique no botão abaixo para gerar seu boleto:</p>
            <a href="/boleto_simulado.pdf" target="_blank"
               style="display:inline-block;background:#444;color:#fff;padding:12px 25px;border-radius:6px;text-decoration:none;font-weight:bold;">
                Gerar Boleto
            </a>
            <form method="post" style="margin-top:10px;">
                <input type="hidden" name="forma_pagamento" value="boleto">
                <button type="submit" style="background:#2b7a2b;color:white;padding:10px 20px;border:none;border-radius:6px;font-weight:bold;">
                    Confirmar Pagamento Boleto
                </button>
            </form>
        </div>

        <form method="post" style="margin-top:30px;">
            <input type="hidden" name="forma_pagamento" value="simulado">
            <button type="submit" class="btn btn-confirmar" style="background:#2b7a2b;color:white;padding:12px;border:none;border-radius:6px;font-weight:bold;">
                ✅ Confirmar Pagamento (simulado)
            </button>
        </form>

        <div style="text-align:center;margin-top:30px;">
            <a href="/dashboard" style="color:#007bff;">⬅ Voltar</a>
        </div>
    </div>

    <script>
    function mostrarPix() {
        document.getElementById('pix-container').style.display = 'block';
    }
    </script>
</body>
</html>
