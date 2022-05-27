
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bienvenido</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="style.css" media="screen" rel="stylesheet">
    <?php include "sesion.php"; ?>
    <?php include "menu.php"; ?>
    
</head>

<body>
    <div class="titulo">
        <h3>Sistema de control de equipo de computo en sucursales.</h3>
    </div>

    

    <div class="wrapper">
    <header>Tareas Pendientes</header>
    <div class="inputField">
      <input type="text" placeholder="Agregar nueva tarea">
      <button><i class="fas fa-plus"></i></button>
    </div>
    <ul class="todoList">
      <!-- Mostraremos los datos de las tareas pendientes almacenadas localmente  -->
    </ul>
    <div class="footer">
      <span>¡Tienes <span class="pendingTasks"></span> tareas pendientes!</span>
      <button>Eliminar Todo</button>
    </div>
  </div>
 
  <script src="js/script.js"></script>

</body>

</html>