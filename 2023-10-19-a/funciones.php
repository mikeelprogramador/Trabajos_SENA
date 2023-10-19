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

    $sql  = "select 2+2 as suma"; // opera sql

    $resultado = $conexion->query($sql);//ejecuta la consulta.
    //recome el recorset 
        while($fila = $resultado->fetch_assoc())//cilo mientras para que muestre en pantalla.
        {
            $salida += $fila['suma'];//los datos del sql al cual apodamos como "suma".
            //puede incrementar o acoumular.
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}

function visualizar1()
{
    $salida = 0; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $sql  = "select 10 as n1, 20 as n2"; // opera sql

    $resultado = $conexion->query($sql);//ejecuta la consulta.
    //recome el recorset 
        while($fila = $resultado->fetch_array())//cilo mientras para que muestre en pantalla.
        {
            $salida += $fila['0'];
            $salida += $fila['1'];//los datos del sql al cual apodamos como "suma".
            //puede incrementar o acoumular.
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}