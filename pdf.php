<?php
require('fpdf/fpdf.php');
require('conexao.php'); // Inclua sua conexão com o banco de dados aqui

// Classe personalizada estendendo FPDF
class PDF extends FPDF
{
    // Rodapé
    function Footer()
    {
        // Posição a 1,5 cm da parte inferior
        $this->SetY(-15);
        // Fonte Arial itálico 8
        $this->SetFont('Arial', 'I', 8);
        // Texto de rodapé
        $this->Cell(0, 10, 'Professor Zilmar Melo - Filosofia', 0, 0, 'L');
        // Capturar data atual
        $this->Cell(0, 10, date('d/m/Y H:i:s') . ' -03:00', 0, 0, 'R');
    }
}

// Obtendo os dados do banco de dados
$id = $_GET['id']; // Supondo que o ID do planejamento seja passado por GET
$sql = "SELECT * FROM planejamento WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$planejamento = $stmt->fetch();

// Criação do PDF
$pdf = new PDF();
$pdf->AddPage();

// Definindo a fonte para o corpo do documento
$pdf->SetFont('Arial', '', 10);

// Cabeçalho
$pdf->SetXY(10, 40);
$pdf->Cell(0, 10, 'Escola Estadual de Educação Profssional Manoel Mano', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Planejamento de Aula', 0, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, 'Data: ' . date('d/m/Y', strtotime($planejamento['data'])), 0, 1, 'L');

// Informações do Planejamento
$pdf->Cell(0, 10, 'Série: ' . $planejamento['serie'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Turma: ' . $planejamento['turma'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Tema: ' . $planejamento['tema'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Objetivos: ' . $planejamento['objetivos'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Área de Conhecimento: ' . $planejamento['area_conhecimento'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Disciplina: ' . $planejamento['disciplina'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Competências Gerais: ' . $planejamento['competencias_ger'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Competências Específicas: ' . $planejamento['competencias_esp'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Habilidades: ' . $planejamento['habilidades'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Objetos de Estudo: ' . $planejamento['objetos'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Descrição: ' . $planejamento['descricao'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Recursos: ' . $planejamento['recursos'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Metodologia de Avaliação: ' . $planejamento['avaliacao'], 0, 1, 'L');

// Saída do PDF
$pdf->Output();
?>
