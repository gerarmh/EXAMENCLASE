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
		<h4>Consulta de datos - Equipos</h4>
	</div>
	<!--Muestra los datos de la base de datos  en forma de tabla equipos-->
	<div class="consulta-tabla">
		<table>
			<thead>
				<tr>
					<td>
						<center>TIPO&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>MARCA&nbsp;&nbsp;&nbsp;</td>
					<td>
						<center>MODELO&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center>SERIE&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center>PLACA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center>EMPLEADO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center>SUCURSAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center>CATEGORIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center>NOMBRE&nbsp;&nbsp;&nbsp;
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
			/* Llama el valor 'buscar' del archivo 'consultaequipo' para mostrar el valor que coincida con la busqueda*/
			$buscar = $_POST['buscar'];

			$sql = ("SELECT equipos.id, equipos.tipo, equipos.marca, equipos.modelo, equipos.serie, equipos.placa, colaboradores.nombrecolab, sucursales.nombresucursal, categoria.Nombre, equipos.nombre_equipo 
			FROM equipos INNER JOIN colaboradores ON equipos.cargo=colaboradores.id INNER JOIN sucursales ON equipos.sucursal=sucursales.id 
			INNER JOIN categoria ON equipos.unidad_negocio=categoria.id where placa ='$buscar'");
			$res = mysqli_query($bd, $sql);
			while ($row = mysqli_fetch_array($res)) {
			?>
				<!--Se imprime en pantalla cada uno de los campos de la base de datos de la tabla equipos-->

				<tr>
					<td><?php echo $row['tipo'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<center><?php echo $row['marca'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['modelo'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['serie'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['placa'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['nombrecolab'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['nombresucursal'] ?>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<center><?php echo $row['Nombre'] ?>&nbsp;&nbsp;&nbsp;
					</td>

					<td>
						<center><?php echo $row['nombre_equipo'] ?>&nbsp;&nbsp;&nbsp;
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