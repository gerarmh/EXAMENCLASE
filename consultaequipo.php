<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT equipos.id, equipos.tipo, equipos.marca, equipos.modelo, equipos.serie, equipos.placa, colaboradores.nombrecolab, sucursales.nombresucursal, categoria.Nombre, equipos.nombre_equipo, colaboradores.numcolab,sucursales.numsucursal 
FROM equipos INNER JOIN colaboradores ON equipos.cargo=colaboradores.id 
INNER JOIN sucursales ON equipos.sucursal=sucursales.id
INNER JOIN categoria ON equipos.unidad_negocio=categoria.id";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Consulta Equipos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Se incluye el archivo que contiene el menu-->
    <?php include "sesion.php"; ?>
    <?php include "menu.php"; ?>
    <!--Se incluye el archivo donde se realiza la elimacion de los datos-->
    <?php include "delete.php"; ?>
    <!--Incluye los estilos-->
    <link href="style.css" rel="stylesheet">
    <!--Incluye la libreria para poder agregar los iconos-->
    <script src="https://kit.fontawesome.com/28fdb2550d.js" crossorigin="anonymous"></script>
    <!-----------------------------------------------AGREGADO RECIEN--------------------------------------->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

</head>

<body>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" style="color:orange">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Consulta de datos - equipos.</li>
        </ol>
    </nav>

    <div class="consulta-tablas">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Serie</th>
                                <th>Placa</th>
                                <th>N.
                                    Empleado</th>
                                <th>Empleado</th>
                                <th>Sucursal</th>
                                <th>N.
                                    Sucursal</th>
                                <th>Categoria</th>
                                <th>Equipo</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                                <th>Alta
                                    PDF</th>
                                <th>Baja
                                    PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $dat['tipo'] ?></td>
                                    <td><?php echo $dat['marca'] ?></td>
                                    <td><?php echo $dat['modelo'] ?></td>
                                    <td><?php echo $dat['serie'] ?></td>
                                    <td><?php echo $dat['placa'] ?></td>
                                    <td><a href="consultarcolab-equipo.php?numcolab=<?php echo $dat['numcolab'] ?>" style="color:orange"> <?php echo $dat['numcolab'] ?></a>	</td>
                                    <td><?php echo $dat['nombrecolab'] ?></td>
                                    <td><a href="consultarsucursal-equipo.php?nombresucursal=<?php echo $dat['nombresucursal'] ?>"style="color:orange"> <?php echo $dat['nombresucursal'] ?></a></td>
                                    <td width="-20%"><?php echo $dat['numsucursal'] ?></td>
                                    <td><?php echo $dat['Nombre'] ?></td>
                                    <td><?php echo $dat['nombre_equipo'] ?></td>
                                    <td>
                                        <a href="eliminarequipo.php?id=<?php echo $dat["id"]; ?>" onclick="return ConfirmDelete()"><i class="far fa-trash-alt" style="color:#000"></i> </a>
                                    </td>

                                    <td>
                                      <a href="modificarequipo.php?id=<?php echo $dat["id"]; ?>"><i class="far fa-edit" style="color:#000"></i> </a>
                                    </td>
                                    <td>
                                        <a href="PDF/altapdf_equipos.php?id=<?php echo $dat["id"]; ?>"><i class="far fa-file-pdf" style="color:#000"></i></a>

                                    </td>
                                    <td>
                                        <a href="PDF/bajapdf_equipos.php?id=<?php echo $dat["id"]; ?>"><i class="far fa-file-pdf" style="color:#000"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--Boton para generar un pdf con todos los datos almaenados en la tabla equipos-->
                    <input type="button" class="btn btn-warning" value="Generar PDF" onClick="location.href='PDF/pdfequipos.php'" />
                </div>
            </div>
        </div>
    </div>
<br>
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>

    <script type="text/javascript" src="main.js"></script>





</body>

</html>