<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Se incluye archivo que contiene el sesion-->
    <?php include "sesion.php"; ?>
    <!--Se incluye el archivo que contiene el menu-->
    <?php include "menu.php"; ?>
    <!--Incluye los estilos-->
    <link href="style.css" rel="stylesheet">
    <!--Incluye la libreria para poder agregar los iconos-->
    <script src="https://kit.fontawesome.com/28fdb2550d.js" crossorigin="anonymous"></script>
</head>

<body>
     <!-- MIGA DE PAN-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Consulta sucursal por NS.</li>
  </ol>
</nav> 
    <?php
    //Se incluye el archivo donde se realiza la conexion a la base de datos
    require_once("conexion.php");
    $numsucursal = $_POST['numsucursal'];
    //Consulta a todos los campos de la tabla sucursales donde el id sea el que selecciono el usuario al realizar la modificar
    $sql = "SELECT * FROM sucursales WHERE numsucursal='" . $numsucursal . "'";
    $res = mysqli_query($bd, $sql) or die(mysqli_error($bd));
    $tot = mysqli_num_rows($res);
    if ($tot > 0) {
        $reg = mysqli_fetch_array($res);
    ?>
        <div class="box">
            <div class="equipo">
                <!--Se crea el formulario para poder editar los datos cada uno de los 
                    campos de la sucursal seleccionada-->

                <form method="GET" action="consultasucursalcodigo3.php">
                    
                    <input type="hidden" name="id" value="<?php echo $reg['id'] ?>">
                    </br>

                    No. Sucursal </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" size="23px" name="nsucursal" value="<?php echo $reg["numsucursal"]; ?>"
                    onkeypress="return solonumeros(event)" onpaste="return false" required="" maxlength="4" minlength="4" pattern="[0-9]+" readonly="readonly">
                    &nbsp;
                    <i class="fas fa-question-circle" data-container="body" data-toggle="popover"  data-placement="right" 
                    data-content="No puede modificar este campo!."></i> </br>
                    Nombre Sucursal: </br> <input type="text" size="23px" name="name" value="<?php echo $reg["nombresucursal"]; ?>" required=""></br>
                    Ubicación:</br> <input type="text" size="23px" name="ubicacion" value="<?php echo $reg["ubicacion"]; ?>" required=""></br>   
                </br>
                    <p>¡No tienes permisos para editar estos campos!</p>
                    <!--Muestra en el formulario las tres categorias que puede tener la sucursal-->

                    <label><input type="checkbox" name="categoria1" class="cuadro" value="1" disabled>Banco Azteca</label>


                    <label><input type="checkbox" name="categoria2" class="cuadro" value="2" disabled>Presta Prenda</label><br>


                    <label><input type="checkbox" name="categoria3" class="cuadro" value="3" disabled>Comercio</label><br>
                    <!--Se enviaran todos los datos almacenados en el formulario por el usuario a la base de datos-->
                    <input type="submit" value="Editar" />&nbsp;&nbsp;&nbsp;
                    <!--Borra todos los datos ingresados en el formulario-->
                    <input type="reset" value="Restablecer" />&nbsp;&nbsp;&nbsp;
                    <!--Cancela cual accion del formulario y direcciona a(consultaequipo) la parte de consultar equipo-->
                    <input type="button" value="Cancelar" OnClick="location.href='consultasucursalcodigo.php'" />
                </form>
            </div>
        </div><br>
        </form>
    <?php
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