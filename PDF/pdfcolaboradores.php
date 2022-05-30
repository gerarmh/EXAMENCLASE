<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
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
	$this->cell(32,5,utf8_decode('Nombre'),1,0,'C',1);
	$this->cell(27,5,utf8_decode('Apellido P.'),1,0,'C',1);
	$this->cell(27,5,utf8_decode('Apellido M.'),1,0,'C',1);
	$this->cell(25,5,utf8_decode('Teléfono'),1,0,'C',1);
    $this->cell(25,5,utf8_decode('N.Empleado'),1,0,'C',1);
	$this->cell(22,5,utf8_decode('N.Sucursal'),1,0,'C',1);
    $this->cell(32,5,utf8_decode('Sucursal'),1,1,'C',1);
	
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
//Incluye el archivo donde se realiza la conexion a la base de datos
require '../conexion.php';
$sql="SELECT colaboradores.id, colaboradores.nombrecolab, colaboradores.apellidop, colaboradores.apellidom, colaboradores.telefono, colaboradores.numcolab, sucursales.nombresucursal, sucursales.numsucursal 
FROM colaboradores INNER JOIN sucursales ON colaboradores.unidad_negocio=sucursales.id 
AND colaboradores.numsucursal=sucursales.id";
$res=mysqli_query($bd,$sql);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','',10);
//Imprime en pantalla todos los campos de la tabla sucursales
while($row=mysqli_fetch_array($res)){
	$pdf->cell(32,5,utf8_decode($row['nombrecolab']),1,0,'C',0);
	$pdf->cell(27,5,utf8_decode($row['apellidop']),1,0,'C',0);
	$pdf->cell(27,5,utf8_decode($row['apellidom']),1,0,'C',0);
	$pdf->cell(25,5,utf8_decode($row['telefono']),1,0,'C',0);
    $pdf->cell(25,5,utf8_decode($row['numcolab']),1,0,'C',0);
	$pdf->cell(22,5,utf8_decode($row['numsucursal']),1,0,'C',0);
    $pdf->cell(32,5,utf8_decode($row['nombresucursal']),1,1,'C',0);
	
	
}




$pdf->Output();
?>