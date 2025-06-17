<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/funcoes_email.php'; // Inclui o envio de e-mail

if (empty($_SESSION['pagamento_confirmado'])) {
    header('Location: /dashboard');
    exit;
}

$dados     = $_SESSION['dados'] ?? [];
$nome      = $dados['nome'] ?? 'Usuário';
$email     = $_SESSION['email'] ?? '';
$telefone  = $_SESSION['telefone'] ?? '';
$dieta     = $_SESSION['dieta'] ?? '';
$refeicoes = $_SESSION['refeicoes_dia'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $opcao = $_POST['opcao'] ?? '';
    $erroEnvio = '';

    // Gera o plano em texto
    ob_start();
    echo "Plano Alimentar – NutriFácil\n\n";
    echo "Nome: {$nome}\n";
    echo "Dieta: {$dieta}\n\n";

    foreach ($refeicoes as $ref) {
        echo "{$ref['titulo']}:\n";
        foreach ($ref['alimentos'] as $item) {
            $nomeAlim = is_array($item) ? $item['nome'] : $item;
            $gramas   = is_array($item) && isset($item['gramas']) ? "{$item['gramas']}g" : '';
            echo "- {$nomeAlim} {$gramas}\n";
        }
        echo "\n";
    }

    $mensagem = trim(ob_get_clean());

    if ($opcao === 'email') {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroEnvio = "E-mail não informado ou inválido. Atualize seu cadastro.";
        } else {
            $assunto = "Seu Plano Alimentar NutriFácil";
            $html = nl2br(htmlspecialchars($mensagem));
            $enviado = enviar_email($email, $assunto, $html);

            if ($enviado) {
                $_SESSION['envio_realizado'] = true;
                $_SESSION['envio_tipo'] = 'email';
                header('Location: /dashboard');
                exit;
            } else {
                $erroEnvio = "Erro ao enviar e-mail. Verifique o log.";
            }
        }
    } elseif ($opcao === 'whatsapp') {
        if (empty($telefone)) {
            $erroEnvio = "Telefone não informado em seu cadastro.";
        } else {
            $phone = preg_replace('/\D+/', '', $telefone);
            $texto = urlencode("Olá {$nome}, aqui está seu plano alimentar da NutriFácil:\n\n{$mensagem}");
            $link = "https://api.whatsapp.com/send?phone=55{$phone}&text={$texto}";

            $_SESSION['envio_realizado'] = true;
            $_SESSION['envio_tipo'] = 'whatsapp';
            header("Location: $link");
            exit;
        }
    } else {
        $erroEnvio = "Opção de envio inválida.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Enviar Dieta | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="login-wrapper" style="background:#f5f5f5;">
    <div style="max-width:500px;margin:50px auto;background:#fff;padding:30px;border-radius:12px;box-shadow:0 0 12px #ddd;">
        <h2 style="text-align:center;margin-bottom:15px;">📤 <span style="color:#2b7a2b;">Enviar Dieta</span></h2>
        <p style="text-align:center;margin-bottom:25px;">
            Olá <strong><?= htmlspecialchars($nome) ?></strong>, escolha como deseja receber sua dieta:
        </p>

        <?php if (!empty($erroEnvio)): ?>
            <p style="color:red;text-align:center;"><?= htmlspecialchars($erroEnvio) ?></p>
        <?php endif; ?>

        <form method="post" style="text-align:center;">
            <button name="opcao" value="whatsapp" type="submit"
                style="background:#25d366;color:#fff;font-weight:bold;font-size:16px;
                       padding:12px 20px;border:none;border-radius:8px;width:100%;
                       margin-bottom:15px;display:flex;align-items:center;justify-content:center;gap:10px;">
                📱 Enviar por WhatsApp
            </button>

            <button name="opcao" value="email" type="submit"
                style="background:#007bff;color:#fff;font-weight:bold;font-size:16px;
                       padding:12px 20px;border:none;border-radius:8px;width:100%;
                       display:flex;align-items:center;justify-content:center;gap:10px;">
                📧 Enviar por E-mail
            </button>
        </form>

        <div style="text-align:center;margin-top:25px;">
            <a href="/dashboard"
               style="display:inline-block;padding:10px 20px;background:#e8f0fe;
                      color:#2b7a2b;border-radius:5px;text-decoration:none;font-weight:bold;">
                ⏩ Ir para o Dashboard
            </a>
        </div>
    </div>
</body>
</html>
