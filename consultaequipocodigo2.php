<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Se incluye el archivo de inicio de sesion-->
    <?php include "sesion.php"; ?>
<!--Se incluye el archivo que contiene el menu-->
    <?php include "menu.php"; ?>
    
    <!--Incluye la libreria de bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
    <li class="breadcrumb-item active" aria-current="page">Consulta equipos por placa.</li>
  </ol>
</nav>
    <?php
    //Se incliye el archivo donde se realiza la conexion a la base de datos
    require_once("conexion.php");
    $placa = $_POST['placa'];
    //Se realiza una consulta a los campos de la tabla equipos.
    $sql = "SELECT equipos.id, equipos.tipo, equipos.marca, equipos.modelo, equipos.serie, equipos.placa, colaboradores.nombrecolab, sucursales.nombresucursal, categoria.Nombre, equipos.nombre_equipo 
		FROM equipos INNER JOIN colaboradores ON equipos.cargo=colaboradores.id INNER JOIN sucursales ON equipos.sucursal=sucursales.id 
		INNER JOIN categoria ON equipos.unidad_negocio=categoria.id WHERE equipos.placa='" . $placa . "'";
    $res = mysqli_query($bd, $sql) or die(mysqli_error($bd));
    
    //Consulta a todos los campos de la tabla sucursal para utilizar el select dinamico al asignar un caloborador en el formulario de equipos
    $sql = "SELECT * FROM colaboradores";
    $res1 = mysqli_query($bd, $sql);
    //Consulta a todos los campos de la tabla sucursal para utilizar el select dinamico al asignar una sucursal en el formulario de equipos
    $sql = "SELECT * FROM sucursales";
    $res2 = mysqli_query($bd, $sql);
    //Consulta a todos los campos de la tabla sucursal para utilizar el select dinamico al asignar una categoria(unidad de negocio) en el formulario de equipos
    $sql = "SELECT * FROM categoria";
    $res3 = mysqli_query($bd, $sql);

    
    $tot = mysqli_num_rows($res);
    
    if ($tot > 0) {
        $reg = mysqli_fetch_array($res);
    ?>
        <div class="box">
            <div class="equipo">
                <!--Se crea el formulario para poder editar los datos cada uno de los 
                    campos del equipo seleccionado-->
                <form method="GET" action="consultaequipocodigo3.php">
                    ID-<?php echo $reg['id'] ?>
                    <input type="hidden" name="id" value="<?php echo $reg['id'] ?>">
                    </br>
                          <!--Se mostrara en una lista desplegable los datos que el usuario podra selccionar para ingresar a la base de datos-->
                    <label>Tipo:</label>
                    [<?php echo $reg['tipo'] ?>]<br>
                    <select name="tipo" required="">
                        <option value="CPU">Cpu</option>
                        <option value="Monitor">Monitor</option>
                        <option value="Scanner">Scanner</option>
                        <option value="Termica">Termica</option>
                        <option value="Lector de codigo">Lector de codigo</option>
                        <option value="Impresora laser">Impresora Laser</option>
                        <option value="Pad firmas">Pad de firmas</option>
                        <option value="Teclado banda">Teclado banda magnetica</option>
                        <option value="Verifone">Verifone</option>
                        <option value="Cheques">Digitalizado de cheques</option>
                    </select><br>
                    <!--Se mostrara en una lista desplegable los datos que el usuario podra selccionar para ingresar a la base de datos-->
                    <label>Marca:</label>
                    [<?php echo $reg['marca'] ?>]<br>
                    <select name="marca" required="">
                        <option value="HP">HP</option>
                        <option value="DELL">DELL</option>
                    </select>
                <br>

                    MODELO </br> <input type="text"  name="modelo" value="<?php echo $reg["modelo"]; ?>" required=""></br>
                    SERIE: </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text"  name="nserie" value="<?php echo $reg["serie"]; ?>"
                    onkeypress="return solonumeros(event)" onpaste="return false" required="" maxlength="6" minlength="6" pattern="[0-9]+" readonly="readonly">
                    &nbsp;
                    <i class="fas fa-question-circle" data-container="body" data-toggle="popover"  data-placement="right" 
                    data-content="No puede modificar este campo!."></i>
                </br>
                    PLACA:</br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text"  name="placa" value="<?php echo $reg["placa"]; ?>" required="" readonly="readonly">
                    &nbsp;
                    <i class="fas fa-question-circle"
                    data-container="body" data-toggle="popover" 
                    data-placement="right" data-content="No puede modificar este campo!.">
                    </i></br>
                    <label>Empleado:</label>
                     <!--Select dinamico para mostrar en el formulario el nombre de los colaboradores almacenados
                 en la base de datos en la tabla colaboradores del campo nombrecolab-->
                    [<?php echo $reg['nombrecolab'] ?>]<br>
                    <select name="empleado" required="">
                    <option>
                        <?php
                        while ($row = mysqli_fetch_array($res1)) {
                        ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['nombrecolab'] ?></option>
                <?php
                        }
                ?>
                
                </option>

                </select><br>
                <!--Select dinamico para mostrar en el formulario el nombre de las tienda  almacenadas
                 en la base de datos en la tabla sucursales  del campo nombresucursal-->
                <label>Sucursal:</label>
                [<?php echo $reg['nombresucursal'] ?>]<br>
                <select name="tienda" required="">
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
                <label>Categoria:</label>
                <!--Select dinamico para mostrar en el formulario las unidades de negocio  almacenadas
                 en la base de datos en la tabla de categoria  del campo nombre-->
                [<?php echo $reg['Nombre'] ?>]<br>
                <select name="categoria" required="">
                    <option>
                        <?php
                        while ($row = mysqli_fetch_array($res3)) {
                        ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['Nombre'] ?></option>
                <?php
                        }
                ?>
                
                </option>
                </select><br>
                NOMBRE EQUIPO </br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="nomequipo" value="<?php echo $reg["nombre_equipo"]; ?>" required="">
                &nbsp;
                <i class="fas fa-question-circle"
                data-container="body" data-toggle="popover" 
                data-placement="right" data-content="Generalmente este campo empieza por el nombre del equipo, ej: WS_VALUA01">
                    </i></br>
                    </br>
                    <!--Envia todos los datos almacenados en el formulario por el usuario a la base de datos-->
                    <input type="submit" value="Editar" />&nbsp;&nbsp;&nbsp;
                    <!--Borra todos los datos ingresados en el formulario-->
                    <input type="reset" value="Restablecer" />&nbsp;&nbsp;&nbsp;
                    <!--Cancela cual accion del formulario y direcciona a(consultaequipo) la parte de consultar equipo-->
                    <input type="button" value="Cancelar" OnClick="location.href='consultaequipocodigo.php'" />
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