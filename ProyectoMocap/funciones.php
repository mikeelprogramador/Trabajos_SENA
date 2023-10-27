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
        $salida .= $fila['producto_nombre']."   <br>  ";
        $salida .="Precio del producto: ". $fila['producto_precio']."   <br>   ";
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
        $salida .="Color: ". $fila['producto_color']."   <br>  ";
        $salida .="Caracteristicas: ". $fila['producto_caracteristicas']."    <br> ";
        $salida .="Precio: ".$fila['producto_precio']."  <br>   ";
        $salida .= "<a href='actualizacion.php?pro=$id_pro&doc=$documento&des=ag'>Agregar</a>"."  <br>   ";
        $salida .= "<a href='actualizacion.php?pro=$id_pro&doc=$documento&des=co'>Comprar</a>";

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
/**
 * 
 * 
 */
function MostrarCarrito($documento)
{
    $salida = ""; 
    require("conexion.php");
    $sql = " select tb_productos.producto_nombre ,tb_productos.producto_color,";
    $sql .= "tb_productos.producto_precio,tb_productos.producto_caracteristicas,estado_compra,id_compra ";
    $sql .= " from tb_compra ";
    $sql .= " inner join tb_productos on tb_compra.producto_id= tb_productos.producto_id ";
    $sql .= " inner join tb_usuarios on tb_compra.id_usuario = tb_usuarios.id_usuario ";
    $sql .= " inner join tb_carrito on tb_carrito.carrito_id = tb_compra.carrito_id ";
    $sql .= " where tb_usuarios.id_usuario = '$documento' ";

    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {
        $salida .= "<hr>";
        $id_com = $fila['id_compra'];
        $salida .= $fila['producto_nombre']."<br>";
        $salida .="Color: ". $fila['producto_color']."<br>";
        $salida .="Caracteristicas: ". $fila['producto_precio']."<br>";
        $salida .="Precio: ". $fila['producto_caracteristicas']."<br>";
        if( $fila['estado_compra'] == "ag")
        {
            $salida .= "Estado del producto: el articulo esta agregado."."<br>";
            $salida .= "<a href='actualizacion.php?des=eli&com=$id_com&doc=$documento'>Eliminar</a>"."<br>";
        }
        if( $fila['estado_compra'] == "co")
        {
            $salida .= "Estado del producto: el articulo esta comprado."."<br>";
        }
        $salida .= "<hr>";
    }
    $conexion->close();
    return $salida;
}
/**
 * 
 * 
 */
function Compra($id_pro,$detalles,$documento)
{
    $salida = "";
    require("conexion.php");
    $sql  = "insert into tb_compra(producto_id,id_usuario,carrito_id,estado_compra) values('$id_pro','$documento','$documento','$detalles')";
    $consulta = $conexion->query($sql);
    if($consulta)
    {
        if($detalles == "ag")
        {
            $salida .= "Se ha agregado a tu carrito de compras"."<br>";
            $salida .= "<a href='inicioPrincipal.php?doc=$documento'>Volver al Inicio</a>";
        }
        if($detalles == "co")
        {
            $salida .= "Se ha agregado la compra a  tu carrito de compras"."<br>";
            $salida .= "<a href='inicioPrincipal.php?doc=$documento'>Volver al Inicio</a>";
        }
    }
    $conexion->close();
    return $salida;
}
/**
 * 
 * 
 */
function ElimiarCompra($id_com,$documento)
{
    $salida ="";
    require("conexion.php");
    $sql = "delete from tb_compra where id_compra='$id_com'";
    $consulta = $conexion->query($sql);
    if($consulta)
    {
        //echo "eliminado";
        header("location: carritoDeCompras.php?doc=$documento"); 
    }
    $conexion->close();
    return $salida; 
}

