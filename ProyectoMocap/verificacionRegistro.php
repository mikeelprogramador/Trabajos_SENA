<?php 

$nombreUsuario=$_GET['nom'];//el nombre del doliente
$correo=$_GET['cor'];//el correo del doliente
$clave=$_GET['cla'];//la clave del doliente

include("funciones.php");

if( registrarPersona($nombreUsuario,$correo,$clave) > 0 )
{
    $id = BuscarPersona($correo,$clave);
    header("location: inicioPrincipal.php?doc=$id");
}else{
    echo "Erro 502";

}


