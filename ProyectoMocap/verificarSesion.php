<?php

$correo=$_GET['cor'];//el correo del doliente
$clave=$_GET['cla'];//la clave del doliente

include("funciones.php");

if( EcontrarPersona($correo,$clave) > 0)
{
    //echo "Bienvenido a Distribucion de markerting ";
    $id = BuscarPersona($correo,$clave);
    header("location: inicioPrincipal.php?doc=$id");

}else{

    echo "Usuario no encontrado, deseas registrarte"
    ?> <a href="registro.php">Registarte</a><?php

}
