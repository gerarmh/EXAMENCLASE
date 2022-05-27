<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT sucursales.id, sucursales.nombresucursal, sucursales.numsucursal, sucursales.ubicacion,
categoria1.Nombre AS 'cate1',categoria2.Nombre AS 'cate2' ,categoria3.Nombre AS 'cate3'
FROM sucursales INNER JOIN categoria AS categoria1 ON sucursales.banco_azteca=categoria1.id 
INNER JOIN categoria AS categoria2 ON sucursales.presta_prenda=categoria2.id 
INNER JOIN categoria AS categoria3 ON sucursales.comercio=categoria3.id";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Consulta Sucursales</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Se incluye el archivo que contiene el menu-->
    <?php include "sesion.php"; ?>
    <?php include "menu.php"; ?>
    <!--Se incluye el archivo donde se realiza la eliminacion de un registro-->
    <?php include "delete.php"; ?>
    <!--Incluye los estilos-->
    <link href="style.css" rel="stylesheet">
    <!--Incluye los iconos de eliminar y editar-->
    <script src="https://kit.fontawesome.com/28fdb2550d.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="peticion.js"></script>
    <!--IMPLEMENTADO RECIEN.-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <!------------------------------------------------MIGA DE PAN-------------------------------------------->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"style="color:orange">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Consulta de datos - sucursales.</li>
        </ol>
    </nav>
    <!------------------------------------------------------------EMPIEZA AQUI------------------------------------------------------------->
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre</th>
                                <th>No.Sucursal</th>
                                <th>Ubicacion</th>
                                <th>Categoria#1</th>
                                <th>Categoria#2</th>
                                <th>Categoria#3</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $dat['nombresucursal'] ?></td>
                                    <td><?php echo $dat['numsucursal'] ?></td>
                                    <td><?php echo $dat['ubicacion'] ?></td>
                                    <td><?php echo $dat['cate1'] ?></td>
                                    <td><?php echo $dat['cate2'] ?></td>
                                    <td><?php echo $dat['cate3'] ?></td>
                                    <td>
                                        <a href="eliminarsucursal.php?id=<?php echo $dat["id"]; ?>" onclick="return ConfirmDelete()"><i class="far fa-trash-alt" style="color:#000"></i></a>
                                    </td>
                                    <td>
                                        <a href="modificarsucursal.php?id=<?php echo $dat["id"]; ?>"><i class="far fa-edit" style="color:#000"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <input type="button" class="btn btn-warning" value="Generar PDF" onClick="location.href='PDF/pdfsucursales.php'" />
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