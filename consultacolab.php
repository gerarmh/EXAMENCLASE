<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT colaboradores.id, colaboradores.nombrecolab, colaboradores.apellidop, colaboradores.apellidom, colaboradores.telefono, colaboradores.numcolab, sucursales.nombresucursal, sucursales.numsucursal 
FROM colaboradores INNER JOIN sucursales ON colaboradores.unidad_negocio=sucursales.id 
AND colaboradores.numsucursal=sucursales.id";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Consulta Colaboradores</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!------------------------------------Esto es para redirigir la pagina a la paginacion 1------------------>
    <?php
    if (!$_GET) {
        header('location:consultacolab.php?pagina=1');
    }
    ?>
    <!-------------------------------------------TERMINA AQUI----------------------------------------------------------------->
    <!--Se incluye el archivo que contiene el menu-->
    <?php include "sesion.php"; ?>
    <?php include "menu.php"; ?>
    <?php include "delete.php"; ?>
    <!--Incluye los estilos-->
    <link href="style.css" rel="stylesheet">
    <!--Incluye los iconos de eliminar y editar-->
    <script src="https://kit.fontawesome.com/28fdb2550d.js" crossorigin="anonymous"></script>
    <!----------------------------------------------------------AGREGADO RECIEN------------------------------------------------------------------------------->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <!-------------------------------------------MIGAS DE PAN------------------------------------------->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" style="color:orange">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Consulta de datos - colaboradores.</li>
        </ol>
    </nav>
    <!---------------------------------------CIERRA AQUI------------------------------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Telefono</th>
                                <th>No.Colaborador</th>
                                <th>N.Sucursal</th>
                                <th>Sucursal</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $dat['nombrecolab'] ?></td>
                                    <td><?php echo $dat['apellidop'] ?></td>
                                    <td><?php echo $dat['apellidom'] ?></td>
                                    <td><?php echo $dat['telefono'] ?></td>
                                    <td><?php echo $dat['numcolab'] ?></td>
                                    <td><?php echo $dat['numsucursal'] ?></td>
                                    <td width="12%"><a href="consultarsucursal.php?nombresucursal=<?php echo $dat['nombresucursal']; ?>" style="color:orange"> <?php echo $dat['nombresucursal'] ?> </a>
                                    <td>
                                        <a href="eliminarcolab.php?id=<?php echo $dat["id"]; ?>" onclick="return ConfirmDelete()"><i class="far fa-trash-alt" style="color:#000"></i> </a>
                                    </td>
                                    <td>
                                         <a href="modificarcolab.php?id=<?php echo $dat["id"]; ?>"> <i class="far fa-edit" style="color:#000"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--Imprimira un PDF con la todos los datos almacenados dentro de la tabla colaboradores-->
                    <input type="button" class="btn btn-warning" value="Generar PDF" onClick="location.href='PDF/pdfcolaboradores.php'" />
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