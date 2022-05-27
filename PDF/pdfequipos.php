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
    $this->Cell(30,30,'Reporte de equipos registrados en la empresa.',3,0,'C');

    
    // Salto de línea
    $this->Ln(30);
	$this->SetFillColor(52,152,219);
	$this->cell(15,5,utf8_decode('Tipo'),1,0,'C',1);
	$this->cell(15,5,utf8_decode('Marca'),1,0,'C',1);
	$this->cell(25,5,utf8_decode('Modelo'),1,0,'C',1);
	$this->cell(25,5,utf8_decode('Serie'),1,0,'C',1);
	$this->cell(25,5,utf8_decode('Placa'),1,0,'C',1);
    $this->cell(20,5,utf8_decode('Empleado'),1,0,'C',1);
    $this->cell(25,5,utf8_decode('Sucursal'),1,0,'C',1);
    $this->cell(20,5,utf8_decode('Categoria'),1,0,'C',1);
    $this->cell(25,5,utf8_decode('Nombre'),1,1,'C',1);

	
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
$sql="SELECT equipos.id, equipos.tipo, equipos.marca, equipos.modelo, equipos.serie, equipos.placa, colaboradores.nombrecolab, sucursales.nombresucursal, categoria.Nombre, equipos.nombre_equipo 
FROM equipos INNER JOIN colaboradores ON equipos.cargo=colaboradores.id INNER JOIN sucursales ON equipos.sucursal=sucursales.id 
INNER JOIN categoria ON equipos.unidad_negocio=categoria.id";
$res=mysqli_query($bd,$sql);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','',8);

//Imprime en pantalla todos los campos de la tabla equipos
while($row=mysqli_fetch_array($res)){
	$pdf->cell(15,5,utf8_decode($row['tipo']),1,0,'C',0);
	$pdf->cell(15,5,utf8_decode($row['marca']),1,0,'C',0);
	$pdf->cell(25,5,utf8_decode($row['modelo']),1,0,'C',0);
	$pdf->cell(25,5,utf8_decode($row['serie']),1,0,'C',0);
	$pdf->cell(25,5,utf8_decode($row['placa']),1,0,'C',0);
    $pdf->cell(20,5,utf8_decode($row['nombrecolab']),1,0,'C',0);
    $pdf->cell(25,5,utf8_decode($row['nombresucursal']),1,0,'C',0);
    $pdf->cell(20,5,utf8_decode($row['Nombre']),1,0,'C',0);
    $pdf->cell(25,5,utf8_decode($row['nombre_equipo']),1,1,'C',0);

}


$pdf->Output();
?>