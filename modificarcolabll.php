<?php
//Incluye sesion para que no puedan acceder al documento desde la barra de direcciones
include "sesion.php";
//Llama al menu
include "menu.php"; 
// Se incluye el archivo donde se reliza la conexion a la base de datos
require_once("conexion.php");
//Se hace un UPDATE  a la tabla colaboradores apartir de los valores ingresados por el usuario en cada uno de las variables
$sql="UPDATE colaboradores SET
nombrecolab='".$_GET["name"]."',
apellidop='".$_GET["apellidop"]."',
apellidom='".$_GET["apellidom"]."',
telefono='".$_GET["telefono"]."',
numcolab='".$_GET["nempleado"]."',
numsucursal='".$_GET["numero_sucursal"]."',
unidad_negocio='".$_GET["nombre_sucursal"]."' WHERE id='".$_GET["id"]."'";
$res=mysqli_query($bd,$sql);

if($res){
	echo"<script type='text/javascript'>
alert('los datos fueron modificados');
window.location='consultacolab.php';
</script>";
	}else{
		echo"<script type='text/javascript'>
alert('error no fue editado');
window.location='consultacolab.php';
</script>";
		
	}
?>