<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../utils/pdf_generator.php'; // Verifique se esse caminho está certo!

if (!isset($_SESSION['plano'])) {
    echo "Dados do plano não encontrados.";
    exit;
}

gerar_pdf_plano($_SESSION['plano']);
