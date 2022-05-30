<?php
//Incluye sesion para que no puedan acceder al documento desde la barra de direcciones
include "sesion.php";
//Llama al menu
include "menu.php"; 
// Se incluye el archivo donde se reliza la conexion a la base de datos
require_once("conexion.php");
//Se hace un UPDATE  a la tabla sucursales apartir de los valores ingresados por el usuario en cada uno de las variables
$sql="UPDATE sucursales SET
numsucursal='".$_GET["nsucursal"]."',
nombresucursal='".$_GET["name"]."',
ubicacion='".$_GET["ubicacion"]."' WHERE id='".$_GET["id"]."'";
$res=mysqli_query($bd,$sql);

if($res){
	echo"<script type='text/javascript'>
alert('los datos fueron modificados');
window.location='consultasucursal.php';
</script>";
	}else{
		echo"<script type='text/javascript'>
alert('error no fue editado');
window.location='consultasucursal.php';
</script>";
		
	}
?>