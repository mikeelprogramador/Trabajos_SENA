<?php 

$nombreUsuario=$_GET['nom'];//el nombre de la persona por URL
$correo=$_GET['cor'];//El dato del correo ingresado por URL
$clave=$_GET['cla'];//Password ingresado por URL

include("funciones.php");//inclucion de el archivo funciones 

if( registrarPersona($nombreUsuario,$correo,$clave) > 0 )
{
    $id = BuscarPersona($correo,$clave);
    //Con la funcion BuscarPersona busca la persona por corre y password 
    //dando el id del ususario y almacenadolo en la variable id.
    header("location: inicioPrincipal.php?doc=$id&bus=");
    //si la persona fue encontrada directamente es inviada al inicio
}else{
    echo "Erro 502";
    //Mensaje de error por si los datos no llegaron o se perdieron
}


