<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sucursales</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Se incluye el archivo que contiene el menu-->
    <?php include "sesion.php"; ?>
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
    <li class="breadcrumb-item active" aria-current="page">Registro sucursales.</li>
  </ol>
</nav>
    <form action="altasucursal.php" method="POST">
        
        <input type="hidden" name="id">
        <div class="box">
            <div class="equipo">
            
                <h4>Registro Sucursales</h4>
                <br>
                <input type="hidden" name="id" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="nsucursal" placeholder="No. Sucursal" onkeypress="return solonumeros(event)" onpaste="return false" 
                required="" maxlength="4" minlength="4" pattern="[0-9]+">
                &nbsp;
                <i class="fas fa-question-circle" data-container="body" data-toggle="popover"  data-placement="right" 
                data-content="Este campo solo admite valores numericos."></i>
                <br><br>
                <input type="text" name="name" placeholder="Nombre Sucursal" required=""><br><br>
                <input type="text" name="ubicacion" placeholder="Ubicación" required=""><br><br>
                <p>Selecciona los negocios con los que cuenta dicha sucursal</p>
                <i class="fas fa-question-circle"
                 data-container="body" data-toggle="popover" 
                 data-placement="right" data-content="En caso contrario de no seleccionar ningun negocio, se dejara automaticamente como; SIN UNIDAD NEGOCIO">
                    
                    </i><br>
                    
                     <!-- Muestra en forma de checkbox las categorias  -->
                    
                    <label><input type="hidden" name="categoria1" value="4" ></label>
                <label><input type="checkbox" name="categoria1" value="1" >Banco Azteca</label>

                <label><input type="hidden" name="categoria2"  value="4" ></label>
                <label><input type="checkbox" name="categoria2"  value="2" >Presta Prenda</label>

                <label><input type="hidden" name="categoria3"  value="4" ></label><br>
                <label><input type="checkbox" name="categoria3"  value="3" >Comercio</label>
                <br>
                
              

                <input type="submit" name="Enviar" value="Enviar">&nbsp;&nbsp;&nbsp;
                <input type="reset" value="Restablecer" />&nbsp;&nbsp;&nbsp;
                <!--Cancela cual accion del formulario y direcciona a(welcome) al inicio del programa-->
                <input type="button" value="Cancelar" OnClick="location.href='index.php'" />
                <?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
    </form>
    </div>
    </div><br>
    </form>
    
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="mensaje.js" charset="utf-8"></script>
<script src="validacion.js" charset="utf-8"></script>
</body>
</html>