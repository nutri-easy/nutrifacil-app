<?php
if (session_status() === PHP_SESSION_NONE) session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Ajuda | NutriFácil</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper" style="background:#f5f5f5; padding:40px 0;">
  <div style="max-width:700px; margin:0 auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 0 12px rgba(0,0,0,0.1);">
    <h2 style="text-align:center; color:#2b7a2b; margin-bottom:20px;">💬 Ajuda</h2>

    <h3>Como funciona o NutriFácil?</h3>
    <p>
      1. 📋 Faça sua avaliação informando peso, altura, idade, sexo, nível de atividade e objetivo (emagrecimento ou hipertrofia).<br>
      2. 🥗 O sistema calcula suas necessidades energéticas (BMR/TMB + TDEE) e monta uma dieta equilibrada em calorias e macronutrientes.<br>
      3. 📲 Você pode visualizar, enviar por WhatsApp ou e-mail seu plano alimentar, e depois acessá-lo sempre que quiser no seu dashboard.
    </p>

    <h3>Perguntas Frequentes</h3>
    <ul>
      <li><strong>Posso refazer a avaliação?</strong><br>
        Sim! Basta clicar em “Refazer Avaliação” no seu Dashboard e inserir novos dados.</li>
      <li><strong>Como edito minhas preferências alimentares?</strong><br>
        Na tela de avaliação, você pode digitar as suas frutas, legumes, verduras, proteínas e carboidratos preferidos.</li>
      <li><strong>O que significam as siglas IMC e TMB?</strong><br>
        IMC: Índice de Massa Corporal; TMB: Taxa Metabólica Basal (gasto calórico em repouso).</li>
      <li><strong>Posso usar em celular e desktop?</strong><br>
        Sim, o layout é responsivo e funciona em qualquer dispositivo.</li>
    </ul>

    <h3>Precisa de mais ajuda?</h3>
    <p>
      Envie um e-mail para <a href="mailto:suporte@nutrifacil.com">suporte@nutrifacil.com</a> ou<br>
      abra um chat pelo WhatsApp: <a href="https://api.whatsapp.com/send?phone=5511999999999" target="_blank">+55 (11) 99999-9999</a>.
    </p>

    <div style="text-align:center; margin-top:30px;">
      <a href="/login" style="display:inline-block; padding:12px 25px; background:#2b7a2b; color:#fff; border-radius:6px; text-decoration:none; font-weight:bold;">
        ← Voltar ao login
      </a>
    </div>
  </div>
</body>
</html>
