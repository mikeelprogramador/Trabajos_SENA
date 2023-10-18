<?php
include("funciones.php");


$nombre = $_GET['nombre'];
$clave = $_GET['clave'];


    
echo registrar($nombre,$clave);
?>

