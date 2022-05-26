<?php
//Se incluye el archivo donde se realiza la conexion a la base de datos
require 'conexion.php';
//Consulta a todos los campos de la tabla colaboradores, esto para tomar el resultado de esta consulta en el 
//formulario al dar de alta un equipo y asingar un colaborador mediante el select dinamico
$sql = "SELECT * FROM colaboradores";
$res = mysqli_query($bd, $sql);
//Consulta a todos los campos de la tabla sucursales, esto para tomar el resultado de esta consulta en el 
//formulario al dar de alta un equipo y asingar una sucursal mediante el select dinamico
$sql = "SELECT * FROM sucursales";
$res1 = mysqli_query($bd, $sql);
//Consulta a todos los campos de la tabla categoria esto para tomar el resultado de esta consulta en el 
//formulario al dar de alta un equipo y asingar una categoria (unidad de negocio) mediante el select dinamico
$sql = "SELECT * FROM categoria";
$res2 = mysqli_query($bd, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Equipos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "sesion.php"; ?>
    <?php include "menu.php"; ?>
    <link href="style.css" rel="stylesheet">
    <!--Incluye la libreria para poder agregar los iconos-->
    <script src="https://kit.fontawesome.com/28fdb2550d.js" crossorigin="anonymous"></script>


</head>

<body>
    <!-- MIGA DE PAN-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro equipos.</li>
  </ol>
</nav>
    <form action="altaequipo.php" method="POST">
        <input type="hidden" name="id">
        <div class="box">
            <div class="equipo">
                <h4>Registro Equipos</h4>
                <label>Tipo</label><br>
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
                <label>Marca</label><br>
                <select name="marca" style="width:180px" required="">
                    <option value="HP">HP</option>
                    <option value="DELL">DELL</option>
                    <option value="LENOVO">LENOVO</option>
                    
                </select><br><br>
                <input type="text" name="modelo" placeholder="Modelo"><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="nserie" placeholder="No. serie."onkeypress="return solonumeros(event)" onpaste="return false" 
                required="" maxlength="6" minlength="6" pattern="[0-9]+">
                &nbsp;
                <i class="fas fa-question-circle" data-container="body" data-toggle="popover"  data-placement="right" 
                data-content="Este campo solo admite valores numericos con seis caracteres."></i><br><br>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="placa" placeholder="Placa" required="">
                &nbsp;
                <i class="fas fa-question-circle"
                 data-container="body" data-toggle="popover" 
                 data-placement="right" data-content="Generalmente este campo empieza por 'GS', ej: GS1678454">
                    </i><br>
                <p>Colaborador asignado</p>
                <select name="sucursal" required="">
                    <option>
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['nombrecolab'] ?></option>
                <?php
                        }
                ?>

                </option>

                </select><br>
                <p>Sucursal</p>
                <select name="tienda" required="">
                    <option>
                        <?php
                        while ($row = mysqli_fetch_array($res1)) {
                        ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['nombresucursal'] ?></option>
                <?php
                        }
                ?>

                </option>

                </select><br>

                <p>Categoria</p>
                <select name="categoria" required="">
                    <option>
                        <?php
                        while ($row = mysqli_fetch_array($res2)) {
                        ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['Nombre'] ?></option>
                <?php
                        }
                ?>

                </option>
                </select><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="nombre_equipo" placeholder="Nombre Equipo" required="">
                &nbsp;
                <i class="fas fa-question-circle"
                 data-container="body" data-toggle="popover" 
                 data-placement="right" data-content="Generalmente este campo empieza por el nombre del equipo, ej: WS_VALUA01">
                    
                    </i><br><br>



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