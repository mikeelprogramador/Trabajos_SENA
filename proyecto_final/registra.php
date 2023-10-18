<?php
include("funciones.php");

activar_errores();

$documento = $_GET['documento'];
$correo = $_GET['correo'];
$clave = $_GET['clave'];

$verificar = 0; 

if( buscar_persona($documento) == 0 )
{
    $verificar = registrar_persona($documento,$correo,$clave);

    if( $verificar == 1)
    {
        echo ("registro exitoso¡");
       header( "location: sesion_inico.php?documento=$docuemnto" );
    }else
    {
        echo("Error: Datos incorreptos");
        header( "location: sistema-registro.php" );
    }
}else
{
    echo("El usuario ya esta registrado <a href='sesion_inico.php?documento=$documento'>Inicio</a>");
}