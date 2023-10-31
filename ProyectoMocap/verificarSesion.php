<?php

$correo=$_GET['cor'];//El dato del correo ingresado por URL
$clave=$_GET['cla'];//Password ingresado por URL

include("funciones.php");//inclucion de el archivo funciones 

if( EcontrarPersona($correo,$clave) > 0)
{
    //echo "Bienvenido a Distribucion de markerting ";
    $id = BuscarPersona($correo,$clave);
    //Con la funcion BuscarPersona busca la persona por corre y password 
    //dando el id del ususario y almacenadolo en la variable id. 
    header("location: inicioPrincipal.php?doc=$id&bus=");
    //si la persona fue encontrada directamente es inviada al inicio

}else{

    //mensaje si los datos no concuerda con la base
    echo "Usuario no encontrado, deseas registrarte"
    //enlace para que se registre el usuario
    ?> <a href="registro.php">Registarte</a><?php

}
