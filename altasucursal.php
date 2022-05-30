<?php
//Llama al menu
include "menu.php"; 
/*Llama al archivo de conexion para la base de datos*/
require_once("conexion.php");
/* Consulta para insertar datos en la tabla sucursales */
$sql = "select id from sucursales
	where id='" . $_POST["id"] . "'";
$res = mysqli_query($bd, $sql);

if (mysqli_num_rows($res) == 0) {
    $consulta = "insert into sucursales values ('" . $_POST["id"] . "',
											'" . $_POST["name"] . "',
                                            '" . $_POST["nsucursal"] . "',
                                            '" . $_POST["ubicacion"] . "',
                                            '" . $_POST["categoria1"] . "',
                                            '" . $_POST["categoria2"] . "',
											'" . $_POST["categoria3"] . "')";
   
   //verificar que no se repita el numero de la sucursal
    $verificar_nsucursal=mysqli_query($bd,"SELECT * FROM sucursales WHERE numsucursal='" . $_POST["nsucursal"] . "'");
    if(mysqli_num_rows($verificar_nsucursal) > 0){
        echo "<script type='text/javascript'>
        alert('El numero de sucursal ya existe, por favor intente con otro!.');
        window.location='sucursales.php';
        </script>";
        exit();
    }

    //Verificar que no se repita la ubicacion de la tienda
    $verificar_ubicacion=mysqli_query($bd,"SELECT * FROM sucursales WHERE ubicacion='" . $_POST["ubicacion"] . "'");
    if(mysqli_num_rows($verificar_ubicacion) > 0){
        echo "<script type='text/javascript'>
        alert('La ubicacion de la sucursal ya existe, por favor intente con otro!.');
        window.location='sucursales.php';
        </script>";
        exit();
    }
    $respuesta = mysqli_query($bd, $consulta);
    echo "<script type='text/javascript'>
alert('Se registro correctamente');
window.location='consultasucursal.php';
</script>";
} else {
    echo "<script type='text/javascript'>
alert('Error no se pudo registrar!.');
window.location='sucursales.php';
</script>";
}
