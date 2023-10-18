<?php

function registrar($nombre,$clave)
{
    require("conexion.php");
    $salida ="";
    $sql = "INSERT INTO personas(nombre, clave) VALUES ('$nombre', '$clave')";
    $resul = $conexion->query($sql);
    
    if ($resul) {
        $salida .= "Te has registrado correctamente.";
        $salida.= "<a href='autenticar.php?'>ingresar</a>";
    } else {
        $salida .= "Error al realizar el registro.";
    }
    return $salida;
}

function verificar($nombre,$clave)
{
    require("conexion.php");
    $salida ="";
    $sql = "SELECT  * from personas where nombre='$nombre' and clave='$clave'";
    $resul = $conexion->query($sql);
 
        if($datos= $resul->fetch_object())
        {
            $salida.= "te has autenticado corectamente";
            $salida.= "<a href='inicio.php?nombre=$nombre'>ingresar</a>";
        }
        else 
        {
            $salida.= "error   ";
        }
    return $salida;
}

function ver($nombre)

{
    require("conexion.php");
    $salida ="";
    $sql = "SELECT  * from personas where nombre='$nombre'";
    $resul = $conexion->query($sql);
    while($fila= $resul->fetch_assoc())
    {
        $salida.= $fila['nombre']."   ";
    }

    return $salida; 
}

function eliminar($nombre)
{
    require("conexion.php");
    $salida ="";
    $sql = "DELETE from personas where nombre='$nombre'";
    $resul = $conexion->query($sql);  
    if($resul)
    {
        $salida.= "te has eliminado";
        
    }
    else 
    {
        $salida.= "error   ";
    }
return $salida;
}

