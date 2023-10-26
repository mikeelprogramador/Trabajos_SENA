<?php

function EcontrarPersona($correo,$clave)
{
    $salida= 0;
    require("conexion.php");
    $sql = "select count(*) from tb_usuarios where usuario_correo ='$correo' and usuario_contrasena = '$clave'";
    $consulta = $conexion->query($sql);
    while($fila= $consulta->fetch_array())
    {
        $salida += $fila[0];
    }
    $conexion->close();
    return $salida; 
}