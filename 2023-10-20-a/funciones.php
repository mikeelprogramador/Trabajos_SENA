<?php
/**
 * Esta fucnion ConsultarPersona de encarga de consultar y mostra las personas 
 * de una base de datos.
 * @return texto los datos de las personas de una base de datos.
 * @param into un numero de identificar de la persona.
 */
function ConsultarPersona($u = null)
{
    $conexion = mysqli_connect('localhost','root','','db_pruebas');// conexion a la base de batos
    $salida = "";// inicialisar la variable de saliad 
    $sql = "select * from personas ";// sql 
    if($u != null )  $sql .= "where id='$u'";//para mostrar un usuario
    $resultado = $conexion->query($sql);//ejecucion del sql
    while($fila = $resultado->fetch_assoc())//ciclo para mostrar en pantalla
    {
        //mostra todos los campos de la base de datos 
        $salida .= $fila['id']."  ";
        $salida .= $fila['nombre']."  ";
        $salida .= $fila['clave']."  ";
        $salida .= $fila['sitio']."  ";
        $salida .= $fila['mensaje']."  ";
    }
    $conexion->close();//finalizar conexion 
    return $salida; //retornar salida 
}

