<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Se incluye el archivo que contiene el menu-->
    <?php include "sesion.php"; ?>
    <?php include "menu.php"; ?>
    <!--Incluye los estilos-->
    <link href="style.css" rel="stylesheet">
    <!--Incluye la libreria para poder utilizar iconos-->
    <script src="https://kit.fontawesome.com/28fdb2550d.js" crossorigin="anonymous"></script>
</head>

<body>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="consultaequipo.php">Consulta de datos - equipos.</a></li>
    <li class="breadcrumb-item active" aria-current="page">Consulta colaboradores por codigo.</li>
  </ol>
</nav>
    <?php
    //Incluye el archivo donde se realiza la conexion a la base de datoss
    require_once("conexion.php");
    $numcolab = $_GET['numcolab'];
    //Consulta a los campos de la tabla colaboradores
    $sql = "SELECT colaboradores.id, colaboradores.nombrecolab, colaboradores.apellidop, colaboradores.apellidom, colaboradores.telefono, 
            colaboradores.numcolab, colaboradores.numsucursal,  sucursales.nombresucursal 
            FROM colaboradores INNER JOIN sucursales ON colaboradores.unidad_negocio=sucursales.id WHERE colaboradores.numcolab='" . $numcolab . "'";
    $res = mysqli_query($bd, $sql) or die(mysqli_error($bd));

    $sql1 = "SELECT colaboradores.id, colaboradores.nombrecolab, colaboradores.apellidop, colaboradores.apellidom, colaboradores.telefono, 
            colaboradores.numcolab, colaboradores.numsucursal, sucursales.numsucursal 
            FROM colaboradores 
            INNER JOIN sucursales ON colaboradores.numsucursal=sucursales.id WHERE colaboradores.numcolab='" . $numcolab . "'";
    $res1 = mysqli_query($bd, $sql1);

    $sql2 = "SELECT * FROM sucursales";
    $res2 = mysqli_query($bd, $sql2);
    $res3 = mysqli_query($bd, $sql2);
    $tot = mysqli_num_rows($res);
    $tot1 = mysqli_num_rows($res1);
    if ($tot > 0) {
        if ($tot1 > 0) {
            $reg = mysqli_fetch_array($res);
            $rog = mysqli_fetch_array($res1);
    ?>
            <div class="box">
                <div class="equipo">
                    <!--Se crea el formulario para poder editar los datos cada uno de los 
                    campos de los colaboradores-->
                    <form method="GET" action="modificarcolabll.php">
                        
                    <input type="hidden" name="id" value="<?php echo $reg['id'] ?>">
                        </br>
                        <!--Se muestra el numero de empleado-->
                        
                        No. empleado<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="nempleado" value="<?php echo $reg["numcolab"]; ?>"
                        onkeypress="return solonumeros(event)" required="" maxlength="6" minlength="6" pattern="[0-9]+" readonly="readonly">
                        &nbsp;
                        <i class="fas fa-question-circle" data-container="body" data-toggle="popover"  data-placement="right" 
                        data-content="No puede modificar este campo.!"></i>
                    </br><!--Salto de linea-->
                        Nombre (s) <br><input type="text" name="name" value="<?php echo $reg["nombrecolab"]; ?>"  required=""></br>
                        Apellido Paterno <br><input type="text" name="apellidop" value="<?php echo $reg["apellidop"]; ?>"  required=""></br>
                        Apellido Materno <br><input type="text" name="apellidom" value="<?php echo $reg["apellidom"]; ?>"  required=""></br>
                        Teléfono <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="telefono" value="<?php echo $reg["telefono"]; ?>"
                        onkeypress="return solonumeros(event)"required="" maxlength="10" minlength="10" pattern="[0-9]+">
                        &nbsp;
                        <i class="fas fa-question-circle"
                        data-container="body" data-toggle="popover" 
                        data-placement="right" data-content="Este campo solo admite valores numericos.">
                        </i>
                    </br>
                        <!--Select dinamico para mostrar los datos almacenados en sucursales del campo nombresucursal-->
                        <p>Sucursal-Unidad negocio</p>
                        [<?php echo $reg['nombresucursal'] ?>]<br>
                        <select name="nombre_sucursal" required="">
                            <option>
                                <?php
                                while ($row = mysqli_fetch_array($res2)) {
                                ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nombresucursal'] ?></option>
                        <?php
                                }
                        ?>

                        </option>

                        </select><br>

                        <!--Select dinamico para mostrar los datos almacenados en sucursales del campo numsucursal-->
                        <p>No. Sucursal</p>
                        [<?php echo $rog['numsucursal'] ?>]<br>
                        <select name="numero_sucursal" required="">
                            <option>
                                <?php
                                while ($row = mysqli_fetch_array($res3)) {
                                ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['numsucursal'] ?></option>
                        <?php
                                }
                        ?>

                        </option>

                        </select><br><br>

                        </br>
                        <!--Envia todos los datos almacenados en el formulario por el usuario a la base de datos-->
                        <input type="submit" value="Editar" />&nbsp;&nbsp;&nbsp;
                        <!--Borra todos los datos ingresados en el formulario-->
                        <input type="reset" value="Restablecer" />&nbsp;&nbsp;&nbsp;
                        <!--Cancela cual accion del formulario y direcciona a(consultasolab) la parte de consultar colaborador-->
                        <input type="button" value="Cancelar" OnClick="location.href='consultaequipo.php'" />
                    </form>
                </div>
            </div><br>
            </form>
    <?php
        }
    }
    ?>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="mensaje.js" charset="utf-8"></script>
<script src="validacion.js" charset="utf-8"></script>
</body>

</html>