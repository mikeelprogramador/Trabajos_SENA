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
    $salida = 0; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $sql  = "select 2+1 as suma";

    return $salida ;  //retorna 
}