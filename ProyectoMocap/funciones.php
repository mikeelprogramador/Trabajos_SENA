<?php
/**
 * Esta funcion sirve para encontra una persona al momeno en el que ella inicia sesion
 * @param varchar Este primer parametro es el correo del usuario 
 * @param varchar El segundo parametro en la password del usuario
 * @return num Al rentornar retona un numero si el valor del numero es 1(la persona fue encontrada)
 * si el valor es 0(la persona no fue encontrada)
 */
function EcontrarPersona($correo,$clave)
{
    $salida= 0;//inicializacion de la variable de salida
    require("conexion.php");//inlcuye la conexion
    $sql = "select count(*) from tb_usuarios where usuario_correo ='$correo' and usuario_contrasena = '$clave'";
    //El sql que ejecuta la pagina
    $consulta = $conexion->query($sql);
    //la ejecucion en la base de datos

        while($fila= $consulta->fetch_array())
        {
            $salida += $fila[0];//se le agrega el dato a la variable salida
        }
    
    $conexion->close();//cierre de la conexion
    return $salida;//la variable que se retorna 
}
/**
 * Funcion de registrar a la perosna en caso de que la persona no llegue 
 * a estar registardo
 * @param varchar El primer parametro es para ingresar el nombre del usuario
 * @param varchar El segundo parametro es el correo del usuario
 * @param varchar El tercer parametro en la password del usuario 
 * @return varchar Retorna un numero que si la persona es agregada retorna 1
 * y si la persona no es agregada retorna 0
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
        $salida .= 1;//se le agrega el dato a la variable salida
    }else{
        $salida .= 0;//se le agrega el dato a la variable salida
    }
   
    $conexion->close(); //cierra la conexion
    return $salida;//retorna la función
    
}
/**
 *Funcion que busca a la persona 
 * @param varchar Este primer parametro es el correo del usuario 
 * @param varchar El segundo parametro en la password del usuario
 * @return num Retorna el id del usuario atraves de los parametros ingresados
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
 * Funcion para mostrar los productos en la pantalla sin mas detalle 
 * @param num El primer y unico parametro es el documento del usuario 
 * @return varchar Retorna los datos del producto y los muestra en la pantalla
 */
function MostrarProductos($documento,$buscar)
{
    $salida= ""; 
    require("conexion.php");
    $sql ="select producto_id,producto_nombre,producto_precio from tb_productos where producto_nombre like '%$buscar%'";
    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {
        $id_pro = $fila['producto_id'];
        $salida .= "<hr>";
        $salida .= $fila['producto_nombre']."   <br>  ";
        $salida .="Precio del producto: ". $fila['producto_precio']."   <br>   ";
        $salida .= "<a href='compra.php?pro=$id_pro&doc=$documento'>Ver mas</a>";
        $salida .= "<br>";
        $salida .= "<hr>";

    }
    $conexion->close();
    return $salida; 
}
/**
 * Funcion para detallar los productos mas concretamnete
 * @param num El primer parametro es el codigo del producto
 * @param num El segundo parametro es el id del usuario
 * @return varchar Retorna los datos del producto mas detallados y los muestra en la pantalla
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
 * Funcion que verifica si el usuario tiene un carrito asignado
 * @param num El documento del usuario que sirve para buscar si ya tiene un carrito asignado
 * @return num Retorna un numero su es 1 ( ya tiene un carrito ) si es 0(no tine un carrito)
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
 * Funcion que actualiza un el carrito dandole al usuario un carrito respectivo
 * @param num El primer y unico parametros es el documento del usuario que tambien 
 * se le va a asignar al carrito
 * @return text no retorna nada 
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
 * Fucnion para mostrar el nombre de las personas 
 * @param num El primer parametro y el unico es el documento de la persona que sirve para encontar 
 * el nombre de dicha persona
 * @return varchar Retorna el nombre del usuario
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
 * Fucnion para mostar los los productos en el carrito de compras
 * @param num El id de la persona para poder buscar si carrito asiganado 
 * @return varchar muestra los datos de la compra y si es agregada o si es comprada 
 * tambien muestra un boton de eliminar producto este boton solo aparece si el articulo 
 * es agregado al carrito
 */
function MostrarCarrito($documento,$detalles)
{
    $salida = ""; 
    require("conexion.php");
    $sql = " select tb_productos.producto_nombre ,tb_productos.producto_color,";
    $sql .= "tb_productos.producto_precio,tb_productos.producto_caracteristicas,estado_compra,id_compra ";
    $sql .= " from tb_compra ";
    $sql .= " inner join tb_productos on tb_compra.producto_id= tb_productos.producto_id ";
    $sql .= " inner join tb_usuarios on tb_compra.id_usuario = tb_usuarios.id_usuario ";
    $sql .= " inner join tb_carrito on tb_carrito.carrito_id = tb_compra.carrito_id ";
    $sql .= " where tb_usuarios.id_usuario = '$documento' and estado_compra = '$detalles' ";

    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {
        $salida .= "<hr>";
        $id_com = $fila['id_compra'];
        $salida .= $fila['producto_nombre']."<br>";
        $salida .="Color: ". $fila['producto_color']."<br>";
        $salida .="Caracteristicas: ". $fila['producto_caracteristicas']."<br>";
        $salida .="Precio: ". $fila['producto_precio']."<br>";
        if( $fila['estado_compra'] == "ag")
        {
            $salida .= "Estado del producto: el articulo esta agregado."."<br>";
            $salida .= "<a href='actualizacion.php?des=eli&com=$id_com&doc=$documento'>Eliminar</a>"."<br>";
            $salida .= "<a href='actualizacion.php?des=yes&com=$id_com&doc=$documento'>Continuar Compra</a>"."<br>";
        }
        if ($fila['estado_compra'] == "co")
        {
            $salida .= "Estado del producto: el articulo esta comprado"."<br>";
            $salida .= "<a href='actualizacion.php?des=fac&com=$id_com&doc=$documento'>Hacer factura</a>"."<br>";
        }
        $salida .= "<hr>";
    }
    $conexion->close();
    return $salida;
}
/**
 * Fucnion para agregar articulos al carrito de compra correspondiente 
 * @param num El primer parametro es el codigo del producto 
 * @param tex El segundo parametro es el detalle de la compra que se ha realizado 
 * @param num El tercer parametro es el id del usuario 
 * @return varchar retorna un mensaje si el producto fue agregado o comprado y muestra un enlace de regreso 
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
            $salida .= "<a href='inicioPrincipal.php?doc=$documento&bus='>Volver al Inicio</a>";
        }
        if($detalles == "co")
        {
            $salida .= "Se ha realizado la compra"."<br>";
            $salida .= "<a href='inicioPrincipal.php?doc=$documento&bus='>Volver al Inicio</a>";
        }
    }
    $conexion->close();
    return $salida;
}
/**
 * Funcion para eliminar los datos del carrito de compras 
 * @param num El primer patrametro ingresado es el codigo de la compra 
 * @param num El segundo parametros es le documento del usuario 
 * @return varchar no retorna nada 
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
/**
 * Fucnion para sumar el presion de los porductos escojidos o comprados por el usuario
 * @param num el numero de documento del usuario
 * @param string un codigo para saber si el estado de la compra
 * @return string la suma de los produstos con  el numero de ello
 */
function SumarPrecios($documento,$detalles)
{
    $salida = ""; 
    require("conexion.php");
    $sql = "select sum(tb_productos.producto_precio)as total,count(*) as productos from tb_compra ";
    $sql .= "inner join tb_productos on tb_compra.producto_id= tb_productos.producto_id ";
    $sql .= "inner join tb_usuarios on tb_compra.id_usuario = tb_usuarios.id_usuario ";
    $sql .= "inner join tb_carrito on tb_carrito.carrito_id = tb_compra.carrito_id ";
    $sql .= "where tb_usuarios.id_usuario = '$documento' and estado_compra = '$detalles' ";
    $consulta  = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {
        $salida .="Productos: ". $fila['productos']." ";
        $salida.= "Total: ".$fila['total'];
    }
    $conexion->close();
    return $salida;

}
/**
 * Funcion que para la Informacion de usuario
 * @param num el documento de la persona
 * @return texto retorna los datos de la persona de la base de datos
 */
function inforUsuario($documento)
{
    $salida = "";
    require("conexion.php");
    $sql= "select usuario_nombre,usuario_correo,usuario_contrasena from tb_usuarios where id_usuario = '$documento'";
    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {
        $salida .= "<hr>";
        $salida .= "Nombre: ".$fila['usuario_nombre']."<br>";
        $salida .= "Correo: ".$fila['usuario_correo']."<br>";
        $salida .= "Contraseña: ".$fila['usuario_contrasena'];
    }
    $conexion->close();
    return $salida;
}
/**
 * Funcion que actualiza el estado de un producto por ejemplo
 * (si el producto esta comprado o agregado)
 * @param num el cadigo al mometo de guardar en el carrito
 * @param num documento de la persona
 * @return txt un texto de salida con un enlace
 */
function actualizarcompra($id_com,$documento)
{
    $salida = "";
    require("conexion.php");
    $sql  = "update tb_compra set estado_compra= 'co' where id_compra= '$id_com' and  id_usuario= '$documento'";
    $consulta = $conexion->query($sql);
    if($consulta)
    {
        $salida .= "Se ha realizado la compra"."<br>";
        $salida .= "<a href='inicioPrincipal.php?doc=$documento&bus='>Volver al Inicio</a>";
    }
    $conexion->close();
    return $salida; 
}
/**
 * Funcion para contar las facturas que hay en la base de datos
 * @param num el cadigo al mometo de guardar en el carrito
 * @return num el numero de compras que hay con ese codigo
 */
function contarfacturas($id_com)
{
    $salida= 0; 
    require("conexion.php");
    $sql = "select count(id_compra) from tb_factura where id_compra='$id_com' ";
    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_array())
    {
        $salida += $fila[0];
    }
    $conexion->close();
    return $salida; 
}
/**
 * Funcion que actualiza la factura  en la base de datos
 * @param num el cadigo al mometo de guardar en el carrito
 * @return num si se agrego o actualizo 1 de lo contrario 0
 */
function actalizarfactura($id_com)
{
    $salida= ""; 
    require("conexion.php");
    $con = contarfacturas($id_com);
    if($con == 0)
    {
        $sql = "insert into tb_factura(id_compra,cantidad)values('$id_com','1')";
        $consulta = $conexion->query($sql);
        if($consulta)
            {
                $salida .= 1;
            }else{
                $salida .= 0;
            }
    $conexion->close();
    return $salida;
    }else{
        $salida .= 0;
    }
}
/**
 * Funcion para mostar las facturas realizadas por el usuario
 * @param num el documento del usuario 
 * @param num el cadigo al mometo de guardar en el carrito
 * @return texto La factura del usuario 
 */
function mostrarfactura($documento,$id_com)
{
    $salida = ""; 
    require("conexion.php");
    $sql = "select tb_factura.factura_id,tb_usuarios.usuario_nombre,tb_productos.producto_nombre, ";
    $sql .= "tb_productos.producto_precio,tb_factura.cantidad ";
    $sql .= " from tb_compra ";
    $sql .= " inner join tb_productos on tb_compra.producto_id= tb_productos.producto_id ";
    $sql .= " inner join tb_usuarios on tb_compra.id_usuario = tb_usuarios.id_usuario ";
    $sql .= " inner join tb_carrito on tb_carrito.carrito_id = tb_compra.carrito_id ";
    $sql .= " inner join tb_factura on  tb_compra.id_compra = tb_factura.id_compra ";
    $sql .= " where tb_usuarios.id_usuario = '$documento' and tb_compra.id_compra='$id_com' ";
    //echo $sql;
    $consulta = $conexion->query($sql);
    while($fila = $consulta->fetch_assoc())
    {
        $salida.= "<hr>";
        $salida.= $fila['factura_id']."<br>";
        $salida.="Nombre: ". $fila['usuario_nombre']."<br>";
        $salida.="Producto: ". $fila['producto_nombre']."<br>";
        $salida.="Valor: ".$fila['producto_precio']."<br>";
        $salida.="Cantidad: ". $fila['cantidad']."<br>";
        $salida.= "<hr>";
        $salida.= "<a href='factura.php?doc=$documento'>Regresar</a>";

    }
    $conexion->close();
    return $salida;

}

