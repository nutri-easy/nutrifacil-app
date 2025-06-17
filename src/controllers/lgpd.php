<?php
if (session_status() === PHP_SESSION_NONE) session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>LGPD | NutriFácil</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper" style="background:#f5f5f5; padding:40px 0;">
  <div style="max-width:700px; margin:0 auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 0 12px rgba(0,0,0,0.1);">
    <h2 style="text-align:center; color:#2b7a2b; margin-bottom:20px;">🔒 Política de Privacidade (LGPD)</h2>

    <p>
      Na NutriFácil levamos a sério a privacidade dos seus dados. Esta política explica como coletamos,
      usamos, protegemos e compartilhamos suas informações pessoais conforme a Lei Geral de Proteção de Dados (LGPD).
    </p>

    <h3>1. Dados que coletamos</h3>
    <ul>
      <li><strong>Informações cadastrais:</strong> nome, e-mail, senha, WhatsApp.</li>
      <li><strong>Dados da avaliação:</strong> peso, altura, idade, sexo, nível de atividade, objetivo, preferências alimentares e alergias.</li>
      <li><strong>Dados de uso:</strong> registros de acesso, geração de dietas e envios.</li>
    </ul>

    <h3>2. Para que usamos seus dados</h3>
    <ul>
      <li>Calcular suas necessidades nutricionais e gerar planos alimentares personalizados.</li>
      <li>Enviar planos por e-mail ou WhatsApp, conforme solicitado.</li>
      <li>Melhorar continuamente nossos serviços e conteúdos.</li>
    </ul>

    <h3>3. Como protegemos seus dados</h3>
    <p>
      Adotamos boas práticas de segurança (HTTPS, hashing de senhas com bcrypt, backups criptografados)
      para evitar acessos não autorizados.
    </p>

    <h3>4. Seus direitos</h3>
    <p>
      Conforme a LGPD, você pode solicitar a qualquer momento:
    </p>
    <ul>
      <li>Confirmação da existência de processamento.</li>
      <li>Acesso e correção de seus dados.</li>
      <li>Anonimização, bloqueio ou eliminação de dados desnecessários.</li>
      <li>Portabilidade dos dados a outro fornecedor.</li>
      <li>Revogação do consentimento.</li>
    </ul>

    <h3>5. Contato</h3>
    <p>
      Qualquer dúvida ou solicitação relacionada à sua privacidade, envie um e-mail para
      <a href="mailto:privacidade@nutrifacil.com">privacidade@nutrifacil.com</a>.
    </p>

    <div style="text-align:center; margin-top:30px;">
      <a href="/login" style="display:inline-block; padding:12px 25px; background:#2b7a2b; color:#fff; border-radius:6px; text-decoration:none; font-weight:bold;">
        ← Voltar ao login
      </a>
    </div>
  </div>
</body>
</html>
