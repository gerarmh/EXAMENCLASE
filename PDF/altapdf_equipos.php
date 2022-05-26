
<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('head.png', 45, 2, 120);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 11);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 30, 'Reporte del equipo registrado en la sucursal.', 3, 0, 'C');

        // Salto de línea
        $this->Ln(30);
        $this->SetFillColor(52, 152, 219);
        $this->cell(15, 5, utf8_decode('Tipo'), 1, 0, 'C', 1);
        $this->cell(15, 5, utf8_decode('Marca'), 1, 0, 'C', 1);
        $this->cell(25, 5, utf8_decode('Modelo'), 1, 0, 'C', 1);
        $this->cell(25, 5, utf8_decode('Serie'), 1, 0, 'C', 1);
        $this->cell(25, 5, utf8_decode('Placa'), 1, 0, 'C', 1);
        $this->cell(20, 5, utf8_decode('Empleado'), 1, 0, 'C', 1);
        $this->cell(25, 5, utf8_decode('Sucursal'), 1, 0, 'C', 1);
        $this->cell(20, 5, utf8_decode('Categoria'), 1, 0, 'C', 1);
        $this->cell(25, 5, utf8_decode('Nombre'), 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->cell(75,-15, 'Nombre Y Firma De Gerente.',0,0,'C');
        $this->cell(155,-15, 'Nombre Y Firma De Soporte T.',0,1,'C');
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
//Se incluye el archivo en el cual se realiza la conexion a la base de datos
require '../conexion.php';
$id = $_GET['id'];
$sql = "SELECT equipos.id, equipos.tipo, equipos.marca, equipos.modelo, equipos.serie, equipos.placa, colaboradores.nombrecolab, sucursales.nombresucursal, categoria.Nombre, equipos.nombre_equipo 
FROM equipos INNER JOIN colaboradores ON equipos.cargo=colaboradores.id INNER JOIN sucursales ON equipos.sucursal=sucursales.id 
INNER JOIN categoria ON equipos.unidad_negocio=categoria.id WHERE equipos.id='" . $id . "'";
$res = mysqli_query($bd, $sql);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial', '', 8);
//Imprime en pantalla todos los campos de la tabla equipos
$tot = mysqli_fetch_array($res);
$pdf->cell(15, 5, utf8_decode($tot['tipo']), 1, 0, 'C', 0);
$pdf->cell(15, 5, utf8_decode($tot['marca']), 1, 0, 'C', 0);
$pdf->cell(25, 5, utf8_decode($tot['modelo']), 1, 0, 'C', 0);
$pdf->cell(25, 5, utf8_decode($tot['serie']), 1, 0, 'C', 0);
$pdf->cell(25, 5, utf8_decode($tot['placa']), 1, 0, 'C', 0);
$pdf->cell(20, 5, utf8_decode($tot['nombrecolab']), 1, 0, 'C', 0);
$pdf->cell(25, 5, utf8_decode($tot['nombresucursal']), 1, 0, 'C', 0);
$pdf->cell(20, 5, utf8_decode($tot['Nombre']), 1, 0, 'C', 0);
$pdf->cell(25, 5, utf8_decode($tot['nombre_equipo']), 1, 1, 'C', 0);

$pdf->SetLineWidth(.5);
$pdf->Line(20,270, 80, 270);
$pdf->Line(130,270, 190, 270);

$pdf->Output();
