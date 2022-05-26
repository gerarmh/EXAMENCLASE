
<?php
//Llama al menu
include "menu.php"; 
//Llama al archivo de conexion para la base de datos
require_once("conexion.php");
// Consulta para insertar datos en la tabla equipos
$sql="select id from equipos
	where id='".$_POST["id"]."'";
	$res=mysqli_query($bd,$sql);
	
	if (mysqli_num_rows($res) == 0)
	{
		$consulta="insert into equipos values ('".$_POST["id"]."',
											'".$_POST["tipo"]."',
											'".$_POST["marca"]."',
											'".$_POST["modelo"]."',
											'".$_POST["nserie"]."',
											'".$_POST["placa"]."',
											'".$_POST["sucursal"]."',
											'".$_POST["tienda"]."',
											'".$_POST["categoria"]."',
											'".$_POST["nombre_equipo"]."')";
 //Verificar que no se repita el numero de serie
 $verificar_nserie=mysqli_query($bd,"SELECT * FROM equipos WHERE serie='" . $_POST["nserie"] . "'");
 if(mysqli_num_rows($verificar_nserie) > 0){
	 echo "<script type='text/javascript'>
	 alert('El numero de serie ya existe, por favor intente con otro!.');
	 window.location='equipo.php';
	 </script>";
	 exit();
 }    
  //Verificar que no se repita la placa del equipo
  $verificar_placa=mysqli_query($bd,"SELECT * FROM equipos WHERE placa='" . $_POST["placa"] . "'");
  if(mysqli_num_rows($verificar_placa) > 0){
      echo "<script type='text/javascript'>
      alert('El numero de placa ya existe, por favor intente con otro!.');
      window.location='equipo.php';
      </script>";
      exit();
  }    
		$respuesta=mysqli_query($bd,$consulta);
		echo"<script type='text/javascript'>
alert('Se registro correctamente');
window.location='consultaequipo.php';
</script>";
	}
	else
	{
		echo"<script type='text/javascript'>
alert('Error');
window.location='equipo.php';
</script>";
	}
	?>