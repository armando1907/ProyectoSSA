<?php

include_once('conexion.php');
include_once('fpdf/fpdf.php');

class PDF extends FPDF 
{

    protected $fontName = 'Arial';

    function renderTitle($text) {
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->fontName, 'B', 24);
        $this->Cell(0, 10, utf8_decode($text), 0, 1,'C');
        $this->Ln();
    }

    function renderSubTitle($text) {
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->fontName, 'B', 16);
        $this->Cell(0, 10, utf8_decode($text), 0, 1,'C');
        $this->Ln();
    }
    function renderTitle2($text) {
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->fontName, 'B', 32);
        $this->Cell(0, 10, utf8_decode($text), 0, 1,'C');
        $this->Ln();
    }
    function renderText($text) {
        $this->SetTextColor(51, 51, 51);
        $this->SetFont($this->fontName, '', 14);
        $this->Cell(0, 7, utf8_decode($text), 0, 1,'C');
        $this->Ln();
    }

    function Header()
    {
        $this->Image('fpdf/img/blank.jpg', 45, null, 100);
    }

    function Footer()
    {
       // Logotipo removido 
       //$this->Image('fpdf/img/logo2.jpg', 78, null, 45);
    }
}

$nombre=$_GET['nombre'];
$codigo=$_GET['codigo'];
$conclusion=$_GET['conclusion'];
$curso=$_GET['curso'];
$instructor=$_GET['instructor'];
$fecha=date('d-m-Y', strtotime($conclusion));
$vigencia=date('d-m-Y', strtotime(date('d-m-Y', strtotime($conclusion))." + 365 day"));


$texto1 = "Se otorga a " . $_GET['nombre'] . " el presente:";
$texto2 = "vigencia del " . $fecha . " al " . $vigencia;
$texto3 = "curso impartido por el instructor " . $_GET['instructor'];
$texto4 = "con una duracion de 8 horas";
$texto5 = "registrado en la plataforma del ISESALUD con el codigo SS-" . $_GET['codigo'];

$pdf = new PDF();

$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->setMargins(16,16,16);
$pdf->SetAutoPageBreak(false,0);

$pdf->SetX(15);
$pdf->renderText($texto1);

$pdf->SetX(15);
$pdf->renderTitle2('CERTIFICADO');

$pdf->renderText('por haber completado y aprobado satisfactoriamente el curso de: ');
$pdf->renderSubTitle($curso);
//

$pdf->SetX(14);
$pdf->renderText($texto2);

$pdf->SetX(8);
$pdf->renderText($texto3);

$pdf->SetX(11);
$pdf->renderText($texto4);

$pdf->SetX(38);
$pdf->renderText($texto5);

$pdf->Output();

?>
