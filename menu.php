<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="styles.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600" rel="stylesheet">

    <!-- Ionic icons-->
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">



    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

</head>

<body>
    <!--Barra de navegacion superior.-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-md-menu"></i>
            </button>
            <a class="navbar-brand" href="index.php"> <img src="salinas.png" alt="150" width="150"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="welcome.php">Inicio</a>
                    </li>
                    <li id="alta" class="nav-item">
                        <a class="nav-link" href="#alta">Registrar</a>
                        <ul>
                            <a class="nav-link" href="empleados.php">Colaboradores</a>
                            <a class="nav-link" href="sucursales.php">Sucursales</a>
                            <a class="nav-link" href="equipo.php">Equipos</a>
                        </ul>
                    </li>
                    <li id="consultacodigo" class="nav-item">
                        <a class="nav-link" href="#consultacodigo">Consulta Por Codigo</a>
                        <ul>
                            <a class="nav-link" href="consultacolabcodigo.php">Colaboradores</a>
                            <a class="nav-link" href="consultasucursalcodigo.php">Sucursales</a>
                            <a class="nav-link" href="consultaequipocodigo.php">Equipos</a>
                        </ul>
                    </li>
                    <li id="consultageneral" class="nav-item">
                        <a class="nav-link" href="#consultageneral">Consulta General</a>
                        <ul>
                            <a class="nav-link" href="consultacolab.php">Colaboradores</a>
                            <a class="nav-link" href="consultasucursal.php">Sucursales</a>
                            <a class="nav-link" href="consultaequipo.php">Equipos</a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <div class="reloj-container"><p id="time">00:00:00</p></div></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" ><p id="date">date</p></a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="js/reloj.js"></script>
</body>
<br><br><br><br><br>

</html>