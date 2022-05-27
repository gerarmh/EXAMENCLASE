
<?php 
//Lo que se realiza en la siguiente linea de codigo es destruir la sesion actual y 
//dirigir al archivo index
session_start();
unset($_SESSION['session_username']);
session_destroy();
header("location:index.php");
?>
