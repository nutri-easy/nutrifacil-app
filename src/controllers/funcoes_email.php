<?php
// Carrega os arquivos do PHPMailer manualmente
require_once __DIR__ . '/../PHPMailer/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer/SMTP.php';
require_once __DIR__ . '/../PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviar_email($destinatario, $assunto, $mensagem_html, $mensagem_texto = '') {
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nutrieasii@gmail.com';
        $mail->Password   = 'ckfi gkfh dlea bcie'; // Senha de app do Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remetente
        $mail->setFrom('nutrieasii@gmail.com', 'NutriFácil');

        // Destinatário
        $mail->addAddress($destinatario);

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body    = $mensagem_html;
        $mail->AltBody = $mensagem_texto ?: strip_tags($mensagem_html);

        // Envia o e-mail
        $mail->send();
        return true;

    } catch (Exception $e) {
        // Registra o erro no log
        error_log("Erro ao enviar e-mail para {$destinatario}: {$mail->ErrorInfo}");
        return false;
    }
}
