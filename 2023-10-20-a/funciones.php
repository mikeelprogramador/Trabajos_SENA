<?php

function ConsultarPersona()
{
    $conexion = mysqli_connect('localhost','root','','db_pruebas');// conexion a la base de batos
    $salida = "";// inicialisar la variable de saliad 
    $sql = "select * from personas";// sql 
    $resultado = $conexion->query($sql);//ejecucion del sql
    while($fila = $resultado->fetch_assoc())//ciclo para mostrar en pantalla
    {
        //nostra todos los campos de la base de datos 
        $salida .= $fila['id']."  ";
        $salida .= $fila['nombre']."  ";
        $salida .= $fila['clave']."  ";
        $salida .= $fila['sitio']."  ";
        $salida .= $fila['mensaje']."  ";
    }
    $conexion->close();//finalizar conexion 
    return $salida; //retornar salida 
}