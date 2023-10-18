<?php
include("funciones.php");


$nombre = $_GET['nombre'];
$clave = $_GET['clave'];


    
echo verificar($nombre,$clave);
?>
