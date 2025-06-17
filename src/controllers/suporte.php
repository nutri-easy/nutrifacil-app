<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: /login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Suporte | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper" style="background:#f6f6f6;">
    <div style="max-width: 500px; margin: 50px auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 0 12px #ddd; text-align:center;">
        <h2 style="margin-bottom:10px; color: #2b7a2b;">📞 Suporte <span style="color:#28a745;">NutriFácil</span></h2>
        <p style="font-size: 16px; color: #333;">
            Precisa de ajuda com seu plano ou está com alguma dúvida?<br>
            Fale com um nutricionista via WhatsApp ou E-mail:
        </p>

        <a href="https://wa.me/5531888888888" target="_blank"
           style="display:inline-block;margin:20px 0;background:#25d366;color:white;padding:12px 20px;border-radius:8px;font-size:16px;font-weight:bold;text-decoration:none;box-shadow:0 0 5px rgba(0,0,0,0.1);">
            💬 Falar no WhatsApp
        </a>

        <div style="margin:20px 0; font-size: 15px;">
            📧 Ou envie um e-mail para:<br>
            <a href="mailto:suporte@nutrifacil.com" style="color:#0066cc;font-weight:bold;">suporte@nutrifacil.com</a>
        </div>

        <a href="/dashboard"
           style="display:inline-block;margin-top:10px;background:#2b7a2b;color:white;padding:10px 20px;border-radius:6px;text-decoration:none;font-weight:bold;">
            ⏪ Voltar ao Painel
        </a>
    </div>
</body>
</html>

