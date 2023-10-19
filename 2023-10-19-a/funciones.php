<?php

function consultar()
{
    $salida = 0; //Se inicializa la varaible de salida. 
    
    $salida = 10*2/2; //calcula el area de un triángulo.

    return $salida; //retorna la operacion.

}

function funcionar()
{
    $salida = 0; //Se inicializa la varaible de salida. 
    
    $salida = 4*8; //calcula el area de un rectangulo.

    return $salida; //retorna la operacion.
}

function visualizar()
{
    $salida = ""; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $sql  = "select 2+2 as suma"; // opera sql

    $resultado = $conexion->query($sql);//respuesta de la base de datos.
    while($fila = $resultado->fetch_assoc())//un ciclo para que pueda mostar los datos.
    {
        $salida .= $fila['suma'];//los datos del sql al cual apodamos como "suma".
    }

    return $salida ;  //retorna 
}