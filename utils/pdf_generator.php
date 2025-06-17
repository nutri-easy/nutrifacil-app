<?php
if (session_status() === PHP_SESSION_NONE) {

}

// Usa a versão local do FPDF
require_once __DIR__ . '/fpdf.php';

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Plano Nutricional - NutriFácil'), 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('NutriFácil - www.nutrifacil.local'), 0, 0, 'C');
    }
}

function gerar_pdf_plano($dados) {
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    // Dados Pessoais
    $pdf->Cell(0, 10, utf8_decode('Nome: ') . ($dados['nome'] ?? '---'), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Peso: ') . ($dados['peso'] ?? '-') . ' kg', 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Altura: ') . ($dados['altura'] ?? '-') . ' cm', 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Idade: ') . ($dados['idade'] ?? '-'), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Sexo: ') . ucfirst($dados['sexo'] ?? '-'), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('IMC: ') . ($dados['imc'] ?? '-'), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('TMB: ') . ($dados['tmb'] ?? '-') . ' kcal', 0, 1);

    // Dieta
    if (!empty($dados['dieta'])) {
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, utf8_decode('Dieta: ') . utf8_decode($dados['dieta']), 0, 1);
    }

    // Alimentos
    if (!empty($dados['alimentos']) && is_array($dados['alimentos'])) {
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, utf8_decode('Alimentos Selecionados:'), 0, 1);
        $pdf->SetFont('Arial', '', 12);
        foreach ($dados['alimentos'] as $a) {
            $pdf->Cell(0, 8, '- ' . utf8_decode($a), 0, 1);
        }
    }

    $pdf->Output('I', 'plano_nutricional.pdf'); // ou 'D' para forçar download
}
