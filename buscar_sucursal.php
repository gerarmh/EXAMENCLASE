<!DOCTYPE html>
<html lang="en">

<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Se incluye el archivo que contiene el menu-->
	<?php include "menu.php"; ?>
	<!--Incluye el archivo de los estilos-->
	<link href="style.css" rel="stylesheet">
	<!--Incluye la libreria de los iconos de eliminar y editar-->
	<script src="https://	kit.fontawesome.com/28fdb2550d.js" crossorigin="anonymous"></script>
</head>

<body>

	<div class="titulo">
		<h4>Consulta de datos - Sucursales</h4>
	</div>
	<!--Muestra en la parte superior de la tabla el nombre de cada uno de los campos 
		que se mandaran a llamar de la tabla colaboradores-->
	<div class="consulta-tabla">
		<table>
			<thead>
				<tr>
					<td>
						<center>Nombre&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center>No.Sucursal
					</td>
					<td>
						<center>Ubicación
					</td>
					<td>
						<center>Categoria #1
					</td>
					<td>
						<center>Categoria #2
					</td>
					<td>
						<center>Categoria #3
					</td>
					<td>

					</td>
					<td>

					</td>

			</thead>
			</tr>

			<?php
			/* Llama al archivo para conectar a la base de datos*/
			require_once("conexion.php");
			/* Llama el valor 'buscar' del archivo 'consultasucursal' para mostrar el valor que coincida con la busqueda*/
			$buscar = $_POST['buscar'];
			/*Se realiza Una consulta los campos seleccionados*/
			$sql = ("SELECT sucursales.id, sucursales.nombresucursal, sucursales.numsucursal, sucursales.ubicacion,
            categoria1.Nombre AS 'cate1',categoria2.Nombre AS 'cate2' ,categoria3.Nombre AS 'cate3'
            FROM sucursales INNER JOIN categoria AS categoria1 ON sucursales.banco_azteca=categoria1.id 
            INNER JOIN categoria AS categoria2 ON sucursales.presta_prenda=categoria2.id 
            INNER JOIN categoria AS categoria3 ON sucursales.comercio=categoria3.id where numsucursal ='$buscar'");
			$res = mysqli_query($bd, $sql);
			while ($row = mysqli_fetch_array($res)) {
			?>
				<!--Se imprime en pantalla cada uno de los campos de la base de datos de la tabla sucursales-->

				<tr>
					<td><?php echo $row['nombresucursal'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<center><?php echo $row['numsucursal'] ?>&nbsp;&nbsp;&nbsp;
					</td>

					<td>
						<center><?php echo $row['ubicacion'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['cate1'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['cate2'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['cate3'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<!--Boton para eliminar el equipo selecionado por el usuario en la base de datos por medio del id-->
					<td>
						<i class="fas fa-trash"></i> <a href="eliminarequipo.php?id=<?php echo $row["id"]; ?>">Eliminar</a>&nbsp;&nbsp;&nbsp;
					</td>
					<!--Boton para editar el los datos del equipo llamando al archivo modificarequipo.php en el cual mostrara el formulario para ingresar los nuevos datos -->
					<td>
						<i class="fas fa-edit"></i> <a href="modificarequipo.php?id=<?php echo $row["id"]; ?>">Editar</a>
					</td>
				<?php
			}
				?>
		</table>
	</div>


</body>

</html>