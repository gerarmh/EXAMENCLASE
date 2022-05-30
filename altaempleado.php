<?php
//Llama al menu
include "menu.php"; 
//Llama al archivo de conexion para la base de datos
require_once("conexion.php");
// Consulta para insertar datos en la tabla colaboradores 
$sql = "select id from colaboradores
	where id='" . $_POST["id"] . "'";
$res = mysqli_query($bd, $sql);
if (mysqli_num_rows($res) == 0) {
    $consulta = "insert into colaboradores values ('" . $_POST["id"] . "',	
											'" . $_POST["name"] . "',
                                            '" . $_POST["apellidop"] . "',
                                            '" . $_POST["apellidom"] . "',
                                            '" . $_POST["telefono"] . "',
                                            '" . $_POST["nempleado"] . "',
                                            '" . $_POST["nsucursal"] . "',                         
											'" . $_POST["sucursal"] . "')";
  //Verificar que no se repita el numero de colaborador
  $verificar_nempleado=mysqli_query($bd,"SELECT * FROM colaboradores WHERE numcolab='" . $_POST["nempleado"] . "'");
  if(mysqli_num_rows($verificar_nempleado) > 0){
      echo "<script type='text/javascript'>
      alert('El numero de colaborador ya existe, por favor intente con otro!.');
      window.location='empleados.php';
      </script>";
      exit();
  }    
    $respuesta = mysqli_query($bd, $consulta);
    echo "<script type='text/javascript'>
alert('Se registro correctamente');
window.location='consultacolab.php';
</script>";
} else {
    echo "<script type='text/javascript'>
alert('Error, no se pudo registrar');
window.location='empleados.php';
</script>";
}
