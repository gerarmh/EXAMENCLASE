<?php
//Se incluye el archivo donde se realiza la conexion a la base de datos
require 'conexion.php';
//Consulta a todos los campos de la tabla sucurslaes
$sql = "SELECT * FROM sucursales";
$res = mysqli_query($bd, $sql);
$res1 = mysqli_query($bd, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>Empleados</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Se incluye archivo que contiene sesion-->
    <?php include "sesion.php"; ?>
    <!--Se incluye el archivo que contiene el menu-->
    <?php include "menu.php"; ?>
    <!--Incluye los estilos-->
    <link href="style.css" rel="stylesheet">
    <!--Incluye la libreria para poder utilizar iconos-->
    <script src="https://kit.fontawesome.com/28fdb2550d.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- MIGA DE PAN-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro empleados.</li>
  </ol>
</nav>


    <form action="altaempleado.php" method="POST">
        <input type="hidden" name="id">
        <div class="box">
            <div class="equipo">
                <h4>Registro Empleados</h4>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="nempleado" placeholder="No. empleado" onkeypress="return solonumeros(event)"  
                required="" maxlength="6" minlength="6" pattern="[0-9]+"> 
                &nbsp;
                <i class="fas fa-question-circle" data-container="body" data-toggle="popover"  data-placement="right" 
                data-content="Este campo solo admite valores numericos."></i>
                <br><br>

                <input type="text" name="name" placeholder="Nombre (s)" required=""><br><br>
                <input type="text" name="apellidop" placeholder="Apellido Paterno" required=""><br><br>
                <input type="text" name="apellidom" placeholder="Apellido Materno" required=""><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="telefono" placeholder="Teléfono" onkeypress="return solonumeros(event)"
                required="" maxlength="10" minlength="10" pattern="[0-9]+">
                &nbsp;
                <i class="fas fa-question-circle"
                 data-container="body" data-toggle="popover" 
                 data-placement="right" data-content="Este campo solo admite valores numericos.">
                    </i>
                <br><br>
               
                <p>Sucursal-Unidad negocio</p>
                <select name="sucursal" required="">
                    <option>
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['nombresucursal'] ?></option>
                <?php
                        }
                ?>
                
                </option>

                </select><br>
                <p>No. Sucursal</p>
                <select name="nsucursal" required="">
                    <option>
                        <?php
                        while ($row = mysqli_fetch_array($res1)) {
                        ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['numsucursal'] ?></option>
                <?php
                        }
                ?>
                
                </option>

                </select><br><br>


                <input type="submit" name="Enviar" value="Enviar">&nbsp;&nbsp;&nbsp;
                <input type="reset" value="Restablecer" />&nbsp;&nbsp;&nbsp;
                <input type="button" value="Cancelar" OnClick="location.href='index.php'" />
    </form>
    </div>
    </div><br>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="mensaje.js" charset="utf-8"></script>
<script src="validacion.js" charset="utf-8"></script>
</body>

</html>