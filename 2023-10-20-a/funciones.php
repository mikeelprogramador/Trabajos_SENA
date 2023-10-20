<?php
/**
 * Esta fucnion ConsultarPersona de encarga de consultar y mostra las personas 
 * de una base de datos.
 * @return text los datos de las personas de una base de datos.
 * @param int un numero de identificar de la persona.
 * @param varchar password del usuario.
 * @param varchar un parametro para realizar el conteo, lo puede llenar con cualquier dato
 * @param int limita la tabla.
 * tenga en cuanta que el parametro tiene que esta para que se realice el conteo.
 */
function ConsultarPersona($u = null,$c = null,$p = null,$b = null)
{
    $conexion = mysqli_connect('localhost','root','','db_pruebas');// conexion a la base de batos
    $salida = "";// inicialisar la variable de saliad 
    $sql = "select * from personas limit $b ";// sql 
    if($u != null )  $sql .= "where id='$u' ";//para mostrar un usuario
    if($u != null and $c != null )  $sql .= " and clave='$c'";//para mostrar un usuario con contraseña
    if($p != null) $sql = "select count(*) as contar from personas";//nuevo sql para hacer el conteo
    $resultado = $conexion->query($sql);//ejecucion del sql
    if($resultado->num_rows > 0)
    {
        if($sql != "select count(*) as contar from personas")//cuando $sql sea diferente  de $p 
        // va ha mostar el codigo toda la tabla de la base de datos
        {
            while($fila = $resultado->fetch_assoc())//ciclo para mostrar en pantalla
            {
                //muestra todos los campos de la base de datos 
                $salida .= $fila['id']."  ";
                $salida .= $fila['nombre']."  ";
                $salida .= $fila['clave']."  ";
                $salida .= $fila['sitio']."  ";
                $salida .= $fila['mensaje']." <br> ";
            }
            
        }else{//si el $sql no es diferente va ha mostar el conteo de las perosnas 
            
            while($fila = $resultado->fetch_assoc())//ciclo para mostrar en pantalla
            {
                //muestra un conteo
                $salida .= $fila['contar']." ";
            }
        }
        
    $conexion->close();//finalizar conexion 
    }else {
        $salida .= "error";// un mensaje de error
    }
    
    return $salida; //retornar salida 
}
