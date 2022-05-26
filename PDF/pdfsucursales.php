<?php
require('fpdf.php');

//La funcion de este archivo es imprimir una consulta general de las sucursales en pdf
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->SetX(15);
    // Logo
    $this->Image('head.png',45,2,120);
    // Arial bold 15
    $this->SetFont('Arial','B',11);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,30,'Reporte de colaboradores registrados en la empresa.',3,0,'C');
    // Salto de línea
    $this->Ln(20);
	$this->SetFillColor(52,152,219);
   
	$this->cell(20,5,utf8_decode('N.Sucursal'),1,0,'C',1);
	$this->cell(40,5,utf8_decode('Nombre'),1,0,'C',1);
	$this->cell(50,5,utf8_decode('Ubicación'),1,0,'C',1);
    $this->cell(30,5,utf8_decode('Categoria 1'),1,0,'C',1);
    $this->cell(30,5,utf8_decode('Categoria 2'),1,0,'C',1);
    $this->cell(25,5,utf8_decode('Categoria 3'),1,1,'C',1);
	
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require '../conexion.php';
$sql="SELECT sucursales.id, sucursales.nombresucursal, sucursales.numsucursal, sucursales.ubicacion,
categoria1.Nombre AS 'cate1',categoria2.Nombre AS 'cate2' ,categoria3.Nombre AS 'cate3'
FROM sucursales INNER JOIN categoria AS categoria1 ON sucursales.banco_azteca=categoria1.id 
INNER JOIN categoria AS categoria2 ON sucursales.presta_prenda=categoria2.id 
INNER JOIN categoria AS categoria3 ON sucursales.comercio=categoria3.id";
$res=mysqli_query($bd,$sql);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','',10);

//Imprime en pantalla todos los campos de la tabla sucursales
while($row=mysqli_fetch_array($res)){
	$pdf->cell(20,5,utf8_decode($row['numsucursal']),1,0,'C',0);
	$pdf->cell(40,5,utf8_decode($row['nombresucursal']),1,0,'C',0);
	$pdf->cell(50,5,utf8_decode($row['ubicacion']),1,0,'C',0);
    $pdf->cell(30,5,utf8_decode($row['cate1']),1,0,'C',0);
    $pdf->cell(30,5,utf8_decode($row['cate2']),1,0,'C',0);
    $pdf->cell(25,5,utf8_decode($row['cate3']),1,1,'C',0);
	
}

$pdf->Output();
?>