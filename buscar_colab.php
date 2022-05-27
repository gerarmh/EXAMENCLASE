<!DOCTYPE html>
<html lang="en">

<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Se incluye el archivo que contiene el menu-->
	<?php include "menu.php"; ?>
	<!--Incluye los estilos-->
	<link href="style.css" rel="stylesheet">
	<!--Incluye los iconos de eliminar y editar-->
	<script src="https://	kit.fontawesome.com/28fdb2550d.js" crossorigin="anonymous"></script>

</head>

<body>

	<div class="titulo">
		<h4>Consulta de datos - Colaboradores</h4>
	</div>

	<div class="consulta-tabla">
		<!--Muestra en la parte superior de la tabla el nombre de cada uno de los campos 
		que se mandaran a llamar de la tabla colaboradores-->
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



			</thead>
			</tr>

			<?php
			/* Llama al archivo para conectar a la base de datos*/
			require_once("conexion.php");
			/* Llama el valor 'buscar' del archivo 'consultacolab' para mostrar el valor que coincida con la busqueda*/
			$buscar = $_POST['buscar'];
			/*Se realiza la consulta que coincida con la variable 'Buscar */
			$sql = ("SELECT colaboradores.id, colaboradores.nombrecolab, colaboradores.apellidop, colaboradores.apellidom, colaboradores.telefono, colaboradores.numcolab, sucursales.nombresucursal, sucursales.numsucursal 
            FROM colaboradores INNER JOIN sucursales ON colaboradores.unidad_negocio=sucursales.id 
            AND colaboradores.numsucursal=sucursales.id where numcolab ='$buscar'");
			$res = mysqli_query($bd, $sql);
			while ($row = mysqli_fetch_array($res)) {
			?>
				<!--Se imprime en pantalla cada uno de los campos de la base de datos de la tabla colaboradores-->

				<tr>
					<td><?php echo $row['nombrecolab'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<center><?php echo $row['apellidop'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['apellidom'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['telefono'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['numcolab'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['numsucursal'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['nombresucursal'] ?>&nbsp;&nbsp;&nbsp;
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