<?php
//Se incluye el archivo donde se realiza la conexion a la base de datos 
require_once("conexion.php");
//Borra el id seleccionado por usuario en el archivo de consulta colaboradores 
$id = $_GET['id'];
$eliminar = "DELETE FROM sucursales WHERE id='$id'";
$resultado = mysqli_query($bd, $eliminar);
//Si se borran los datos en la base de datos 
	//mostrara en una pequeña ventana el siguiente mensaje 
if ($resultado) {
	echo "<script type='text/javascript'>
alert('los datos fueron eliminados');
window.location='consultasucursal.php';
</script>";
	// De lo contrario al no realizar la funcion anterior de borrar los 
	//datos nos mostrara el siguiente mensaje en una pequeña ventana
} else {
	echo "<script type='text/javascript'>
alert('error no fue eliminado');
window.location='consultasucursal.php';
</script>";
}
