<?php

$correo= $_GET['cor'];
$clave= $_GET['cla'];
include("funciones.php");

if( EcontrarPersona($correo,$clave) > 0)
{
    //echo "Bienvenido a Distribucion de markerting ";
    header("location: inicioPrincipal.php");

}else{

    echo "Usuario no encontrado, deseas registrarte"
    ?> <a href="registro.php">Registarte</a><?php

}
