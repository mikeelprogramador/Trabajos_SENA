<?php
/**
 * 
 * 
 * 
 */
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
/**
 * 
 * 
 * 
 * 
 */
function registrarPersona($nombreUsuario,$correo,$clave)
{
   
    $salida = ""; //inicializa la variable
    require("conexion.php");//conecta a una base de datos
    $sql = "INSERT INTO tb_usuarios(usuario_nombre,usuario_correo,usuario_contrasena)";
    $sql .=" VALUES ('$nombreUsuario','$correo','$clave')";//inserta a una persona en la base de datos
    //echo $sql;
    $consultar = $conexion->query($sql);//es para que muestre el resultado
    if($conexion->affected_rows > 0 )
    {
        $salida .= 1;
    }else{
        $salida .= 0;
    }
   
    $conexion->close(); //cierra la conexion
    return $salida;//retorna la función
    
}
/**
 * 
 * 
 * 
 */
function BuscarPersona($correo,$clave)
{
    $salida = 0;
    require("conexion.php");
    $sql = "select id_usuario from tb_usuarios where usuario_correo='$correo' and usuario_contrasena='$clave'";
    $consultar = $conexion->query($sql);
    while($fila= $consultar->fetch_assoc())
    {
        $salida += $fila['id_usuario'];
    }
    $conexion->close();
    return $salida; 
}
/**
 * 
 * 
 * 
 * 
 */
function MostrarProductos($documento)
{
    $salida= ""; 
    require("conexion.php");
    $sql ="select producto_id,producto_nombre,producto_precio from tb_productos";
    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {
        $id_pro = $fila['producto_id'];
        $salida .= "<hr>";
        $salida .= $fila['producto_nombre']."     ";
        $salida .= $fila['producto_precio']."     ";
        $salida .= "<a href='compra.php?pro=$id_pro&doc=$documento'>Comprar</a>";
        $salida .= "<br>";
        $salida .= "<hr>";

    }
    $conexion->close();
    return $salida; 
}
/**
 * 
 * 
 * 
 */
function DetallesProductos($id_pro,$documento)
{
    $salida= ""; 
    require("conexion.php");
    $sql ="select * from tb_productos where producto_id='$id_pro'";
    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {

        $salida .= "<hr>";
        $salida .= $fila['producto_nombre']."  <br>   ";
        $salida .= $fila['producto_color']."   <br>  ";
        $salida .= $fila['producto_caracteristicas']."    <br> ";
        $salida .= $fila['producto_precio']."  <br>   ";
        $salida .= "<a href='carritoDeCompras.php?pro=$id_pro&doc=$documento&des=ag'>Agregar</a>"."  <br>   ";
        $salida .= "<a href='carritoDeCompras.php?pro=$id_pro&doc=$documento&des=co'>Comprar</a>";

        $salida .= "<br>";
        $salida .= "<hr>";

    }
    $conexion->close();
    return $salida; 
}
/**
 * 
 * 
 * 
 */
function VerificarCarrito($documento)
{
    $salida= 0; 
    require("conexion.php");
    $sql = "select count(*) FROM tb_carrito where id_usuario='$documento'";
    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_array())
    {
        $salida += $fila[0];
    }
    $conexion->close();
    return $salida; 
}
/**
 * 
 * 
 */
function actualizarcarro($documento)
{
    $salida= ""; 
    require("conexion.php");
    if( VerificarCarrito($documento) == 0)
    {
        $sql = "INSERT INTO tb_carrito(carrito_id,id_usuario) values('$documento','$documento')";
        $consulta = $conexion->query($sql);
        if($consulta)
        {
            $conexion->close();
            return $salida; 
        }
        
    }

}
/**
 * 
 * 
 * 
 */
function MostrarNombre($documento)
{
    $salida = ""; 
    require("conexion.php");
    $sql = "select usuario_nombre from tb_usuarios where id_usuario='$documento'";
    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {
        $salida .= "<h1>";
        $salida .= $fila['usuario_nombre'];
        $salida .= "</h1>";
    }
    $conexion->close();
    return $salida; 
}
function AgregarProducto($id_pro)
{
    $salida= ""; 
    require("conexion.php");
    $sql ="select * from tb_productos where producto_id='$id_pro'";
    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {

        $salida .= "<hr>";
        $salida .= $fila['producto_nombre']."  <br>   ";
        $salida .= $fila['producto_color']."   <br>  ";
        $salida .= $fila['producto_caracteristicas']."    <br> ";
        $salida .= $fila['producto_precio']."  <br>   ";
        //$salida .= "<a href='carritoDeCompras.php?pro=$id_pro&doc=$documento&des=ag'>Agregar</a>"."  <br>   ";
       //$salida .= "<a href='carritoDeCompras.php?pro=$id_pro&doc=$documento&des=co'>Comprar</a>";

        $salida .= "<br>";
        $salida .= "<hr>";

    }
    $conexion->close();
    return $salida;
}

