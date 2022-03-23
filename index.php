<?php
require('./fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
   
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(95);
    // Título
    $this->Cell(1,1, utf8_decode('COORDINACIÓN DE LENGUAS EXTRANJERAS'),0,0,'C');
    $this->Ln(5);
    $this->Cell(192,1, utf8_decode('TecNM-SEV-DVIA-PCLE-ACT-01/27-ITGAM-09'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(90, 10, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(45, 10, 'precio', 1, 0, 'C', 0);
    $this->Cell(45, 10, 'stock', 1, 1, 'C', 0);

}


        


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require './cn.php';
$consulta = "SELECT * FROM productos";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(90, 10, $row['nombre'], 1, 0, 'C', 0);
    $pdf->Cell(45, 10, $row['precio'], 1, 0, 'C', 0);
    $pdf->Cell(45, 10, $row['stock'], 1, 1, 'C', 0);
}


$pdf->Output();
?>