<?php

require __DIR__.'/vendor/autoload.php';
require_once 'conexion.php';

use Spipu\Html2Pdf\Html2Pdf;

// Recoger el contenido de otro fichero
ob_start();
require_once 'credencial.php';
$html = ob_get_clean();


$html2pdf = new Html2Pdf('P','A5','es','true','UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output('Credencial.pdf');

