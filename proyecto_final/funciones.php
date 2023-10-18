<?php

function activar_errores(){

    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);
}

function buscar_persona($documento)
{
    require("conexion.php");
    $salida = 0;
    $sql = "SELECT count(*) from tb_usuarios where id_usuario= '$documento'";
    $resul = $conexion->query($sql);
    while($fila= $resul->fetch_array())
    {
        $salida = $fila[0];
    }
    $conexion->close();
    return $salida; 

}


function registrar_persona($documento,$correo,$clave)
{
    require("conexion.php");
    $salida = 0;
    $sql = "INSERT INTO tb_usuarios(id_usuario,usuario_correo,usuario_contrasena)";
    $sql.= "values( '$documento', '$correo','$clave')";

    try {

        $resul = $conexion->query($sql);

    }catch (mysqli_sql_exception $e){

    }
    
    if($conexion->affected_rows > 0){

        $salida = 1; 

    }else{

        $salida = 0; 
    }

    $conexion->close(); 

    return $salida; 
}


/**
 * Se encarga de mostrar a todas las personas. Usa fech assoc en  lugar de fetch array.
 * @return		texto		Texto que representa html.	
 */
function consultar_personas( $doc_buscado = null ){

    require("conexion.php");
    $salida = ""; 
    $sql  = "select * from tb_usuarios ";
    if( $doc_buscado != null  ) $sql .= " where id_usuario = '$doc_buscado' ";
    $resultado = $conexion->query( $sql );
   
    while( $fila = mysqli_fetch_assoc( $resultado ) ){

        $doc = $fila['id_usuario']; 
        
        if( $doc_buscado == null ){

            $salida .= $doc." <a href='sesion_inico.php?documento=$doc'>".$fila['usuario_correo']."</a>";

        }else{

            $salida .= "<h1>".$fila['usuario_correo']."</h1>";
            $salida .= "<hr>";
            $salida .= "<a href='sistema-carrito.php?documento=$doc'>carrito</a>";

        }

        $salida .= "<br>";
    }

    $conexion->close();

    return $salida;
}

function encontrar_compras($documento)
{
    require("conexion.php");
    $salida = 0; 
    $sql = "SELECT  count(*) ";
    $sql .= "from compra ";
    $sql .= "inner join tb_productos on compra.producto_id= tb_productos.producto_id ";
    $sql .= "inner join tb_usuarios on compra.id_usuario = tb_usuarios.id_usuario ";
    $sql .= "where tb_usuarios.id_usuario = '$documento'";
   //echo $sql;
   try {

    $resul = $conexion->query($sql);

    }catch (mysqli_sql_exception $e){

    }

        while( $fila = $resul->fetch_array())   
        {
           $salida = $fila[0];
        }
    $conexion->close();
    return $salida;
}

function compra_persona($documento)
{
    require("conexion.php");
    $salida = ""; 
    $sql = "SELECT tb_productos.producto_nombre ";
    $sql .= "from compra ";
    $sql .= "inner join tb_productos on compra.producto_id= tb_productos.producto_id ";
    $sql .= "inner join tb_usuarios on compra.id_usuario = tb_usuarios.id_usuario ";
    $sql .= "where tb_usuarios.id_usuario = '$documento'";
    //echo $sql;
    $resul = $conexion->query($sql);
  
    
            while( $fila = mysqli_fetch_array($resul))   
            {
               $salida .= $fila[0];
            }
        $conexion->close();
        return $salida;
        

}
