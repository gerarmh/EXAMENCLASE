<?php
//Incluye sesion para que no puedan acceder al documento desde la barra de direcciones
include "sesion.php";
//Llama al menu
include "menu.php"; 
// Se incluye el archivo donde se reliza la conexion a la base de datos
require_once("conexion.php");
//Se hace un UPDATE  a la tabla equipos apartir de los valores ingresados por el usuarioen cada uno de las variables
$sql="UPDATE equipos SET
tipo='".$_GET["tipo"]."',
marca='".$_GET["marca"]."',
modelo='".$_GET["modelo"]."',
serie='".$_GET["nserie"]."',
placa='".$_GET["placa"]."',
cargo='".$_GET["empleado"]."',
sucursal='".$_GET["tienda"]."',
unidad_negocio='".$_GET["categoria"]."',
nombre_equipo='".$_GET["nomequipo"]."' WHERE id='".$_GET["id"]."'";
$res=mysqli_query($bd,$sql);

if($res){
	echo"<script type='text/javascript'>
alert('los datos fueron modificados');
window.location='consultaequipo.php';
</script>";
	}else{
		echo"<script type='text/javascript'>
alert('error no fue editado');
window.location='consultaequipo.php';
</script>";
		
	}
?>