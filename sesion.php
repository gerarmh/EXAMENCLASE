<?php 
session_start();
//Si el username cuenta con un rol de administrador y existe en la base de datos permitira al usuario 
//ingresa al programa, direccionadolo al inicio.
if (!isset($_SESSION['rol']) && isset($_SESSION['username'])) {
	header('location:index.php');
 ?>
 <?php 
 //De no existir el usuario con un rol asignado no permitira el acceso y mostrara un mensaje al usuario
}else{
	if($_SESSION['rol']!=1){
     header("Location: error.php");
     exit();
}}
 ?>