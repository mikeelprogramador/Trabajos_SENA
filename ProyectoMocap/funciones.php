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

 function BuscarPersona($correo,$clave) // Define la función con dos parámetros: el correo y la clave de la persona
{
     $salida = 0; // Inicializa la variable de salida a 0
     require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
     $sql = "select id_usuario from tb_usuarios where usuario_correo='$correo' and usuario_contrasena='$clave'"; // Crea la consulta SQL que selecciona el id del usuario que coincide con el correo y la clave dados
     $consultar = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consultar
     while($fila= $consultar->fetch_assoc()) // Recorre el resultado con un bucle while, asignando cada fila a la variable $fila como un array asociativo
     {
         $salida += $fila['id_usuario']; // Suma el valor del campo id_usuario de la fila actual a la variable de salida
     }
     $conexion->close(); // Cierra la conexión a la base de datos
     return $salida; // Devuelve la variable de salida como el resultado de la función
 }
 
/**
 * Funcion para mostrar los productos en la pantalla sin mas detalle 
 * @param num El primer y unico parametro es el documento del usuario 
 * @return varchar Retorna los datos del producto y los muestra en la pantalla
 */
function MostrarProductos($documento,$buscar) // Define la función con dos parámetros: el documento y el buscar
{
    $salida= ""; // Inicializa la variable de salida como una cadena vacía
    require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
    $sql ="select producto_id,producto_nombre,producto_precio from tb_productos where producto_nombre like '%$buscar%'"; // Crea la consulta SQL que selecciona el id, el nombre y el precio de los productos cuyo nombre contiene el valor de la variable buscar
    $consulta = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consulta
    while($fila = $consulta->fetch_assoc()) // Recorre el resultado con un bucle while, asignando cada fila a la variable $fila como un array asociativo
    {
        $id_pro = $fila['producto_id']; // Asigna el valor del campo producto_id de la fila actual a la variable $id_pro
        $salida .= "<hr>"; // Concatena un elemento HTML de línea horizontal a la variable de salida
        $salida .= $fila['producto_nombre']."   <br>  "; // Concatena el nombre del producto y un salto de línea a la variable de salida
        $salida .="Precio del producto: ". $fila['producto_precio']."   <br>   "; // Concatena el precio del producto y un salto de línea a la variable de salida
        $salida .= "<a href='compra.php?pro=$id_pro&doc=$documento'>Ver mas</a>"; // Concatena un elemento HTML de enlace que pasa el id del producto y el documento como parámetros a la variable de salida
        $salida .= "<br>"; // Concatena un salto de línea a la variable de salida
        $salida .= "<hr>"; // Concatena un elemento HTML de línea horizontal a la variable de salida

    }
    $conexion->close(); // Cierra la conexión a la base de datos
    return $salida; // Devuelve la variable de salida como el resultado de la función
}

/**
 * Funcion para detallar los productos mas concretamnete
 * @param num El primer parametro es el codigo del producto
 * @param num El segundo parametro es el id del usuario
 * @return varchar Retorna los datos del producto mas detallados y los muestra en la pantalla
 */
function DetallesProductos($id_pro,$documento) // Define la función con dos parámetros: el id del producto y el documento del usuario
{
    $salida= ""; // Inicializa la variable de salida como una cadena vacía
    require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
    $sql ="select * from tb_productos where producto_id='$id_pro'"; // Crea la consulta SQL que selecciona todos los campos de la tabla tb_productos donde el producto_id sea igual al id del producto dado
    $consulta = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consulta
    while($fila = $consulta->fetch_assoc()) // Recorre el resultado con un bucle while, asignando cada fila a la variable $fila como un array asociativo
    {

        $salida .= "<hr>"; // Concatena un elemento HTML de línea horizontal a la variable de salida
        $salida .= $fila['producto_nombre']."  <br>   "; // Concatena el nombre del producto y un salto de línea a la variable de salida
        $salida .="Color: ". $fila['producto_color']."   <br>  "; // Concatena el color del producto y un salto de línea a la variable de salida
        $salida .="Caracteristicas: ". $fila['producto_caracteristicas']."    <br> "; // Concatena las características del producto y un salto de línea a la variable de salida
        $salida .="Precio: ".$fila['producto_precio']."  <br>   "; // Concatena el precio del producto y un salto de línea a la variable de salida
        $salida .= "<a href='actualizacion.php?pro=$id_pro&doc=$documento&des=ag'>Agregar</a>"."  <br>   "; // Concatena un elemento HTML de enlace que pasa el id del producto, el documento del usuario y la acción de agregar como parámetros a la variable de salida
        $salida .= "<a href='actualizacion.php?pro=$id_pro&doc=$documento&des=co'>Comprar</a>"; // Concatena un elemento HTML de enlace que pasa el id del producto, el documento del usuario y la acción de comprar como parámetros a la variable de salida

        $salida .= "<br>"; // Concatena un salto de línea a la variable de salida
        $salida .= "<hr>"; // Concatena un elemento HTML de línea horizontal a la variable de salida

    }
    $conexion->close(); // Cierra la conexión a la base de datos
    return $salida; // Devuelve la variable de salida como el resultado de la función
}

/**
 * Funcion que verifica si el usuario tiene un carrito asignado
 * @param num El documento del usuario que sirve para buscar si ya tiene un carrito asignado
 * @return num Retorna un numero su es 1 ( ya tiene un carrito ) si es 0(no tine un carrito)
 */
function VerificarCarrito($documento) // Define la función con un parámetro: el documento del usuario
{
    $salida= 0; // Inicializa la variable de salida a 0
    require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
    $sql = "select count(*) FROM tb_carrito where id_usuario='$documento'"; // Crea la consulta SQL que cuenta el número de productos que el usuario tiene en su carrito
    $consulta = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consulta
    while($fila = $consulta->fetch_array()) // Recorre el resultado con un bucle while, asignando cada fila a la variable $fila como un array numérico
    {
        $salida += $fila[0]; // Suma el valor del primer campo de la fila actual a la variable de salida
    }
    $conexion->close(); // Cierra la conexión a la base de datos
    return $salida; // Devuelve la variable de salida como el resultado de la función
}

/**
 * Funcion que actualiza un el carrito dandole al usuario un carrito respectivo
 * @param num El primer y unico parametros es el documento del usuario que tambien 
 * se le va a asignar al carrito
 * @return text no retorna nada 
 */
function actualizarcarro($documento) // Define la función con un parámetro: el documento del usuario
{
    $salida= ""; // Inicializa la variable de salida como una cadena vacía
    require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
    if( VerificarCarrito($documento) == 0) // Si el usuario no tiene productos en su carrito, es decir, la función VerificarCarrito devuelve 0
    {
        $sql = "INSERT INTO tb_carrito(carrito_id,id_usuario) values('$documento','$documento')"; // Crea la consulta SQL que inserta un nuevo registro en la tabla tb_carrito con el documento del usuario como carrito_id e id_usuario
        $consulta = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consulta
        if($consulta) // Si la consulta se realizó con éxito
        {
            $conexion->close(); // Cierra la conexión a la base de datos
            return $salida; // Devuelve la variable de salida como el resultado de la función
        }
    }
}

/**
 * Fucnion para mostrar el nombre de las personas 
 * @param num El primer parametro y el unico es el documento de la persona que sirve para encontar 
 * el nombre de dicha persona
 * @return varchar Retorna el nombre del usuario
 */
function MostrarNombre($documento) // Define la función con un parámetro: el id del usuario
{
    $salida = ""; // Inicializa la variable de salida como una cadena vacía
    require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
    $sql = "select usuario_nombre from tb_usuarios where id_usuario='$documento'"; // Crea la consulta SQL que selecciona el nombre del usuario que coincide con el id dado
    $consulta = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consulta
    while($fila = $consulta->fetch_assoc()) // Recorre el resultado con un bucle while, asignando cada fila a la variable $fila como un array asociativo
    {
        $salida .= "<h1>"; // Concatena un elemento HTML de encabezado de nivel 1 a la variable de salida
        $salida .= $fila['usuario_nombre']; // Concatena el nombre del usuario de la fila actual a la variable de salida
        $salida .= "</h1>"; // Concatena el cierre del elemento HTML de encabezado de nivel 1 a la variable de salida
    }
    $conexion->close(); // Cierra la conexión a la base de datos
    return $salida; // Devuelve la variable de salida como el resultado de la función
}

/**
 * Fucnion para mostar los los productos en el carrito de compras
 * @param num El id de la persona para poder buscar si carrito asiganado 
 * @return varchar muestra los datos de la compra y si es agregada o si es comprada 
 * tambien muestra un boton de eliminar producto este boton solo aparece si el articulo 
 * es agregado al carrito
 */
function MostrarCarrito($documento,$detalles) // Define la función con dos parámetros: el id del usuario y el estado de compra de los productos
{
    $salida = ""; // Inicializa la variable de salida como una cadena vacía
    require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
    $sql = " select tb_productos.producto_nombre ,tb_productos.producto_color,"; // Crea la consulta SQL que selecciona el nombre, el color,
    $sql .= "tb_productos.producto_precio,tb_productos.producto_caracteristicas,estado_compra,id_compra "; // el precio, las características, el estado de compra y el id de compra de los productos
    $sql .= " from tb_compra "; // de la tabla tb_compra
    $sql .= " inner join tb_productos on tb_compra.producto_id= tb_productos.producto_id "; // haciendo un join con la tabla tb_productos por el campo producto_id
    $sql .= " inner join tb_usuarios on tb_compra.id_usuario = tb_usuarios.id_usuario "; // haciendo un join con la tabla tb_usuarios por el campo id_usuario
    $sql .= " inner join tb_carrito on tb_carrito.carrito_id = tb_compra.carrito_id "; // haciendo un join con la tabla tb_carrito por el campo carrito_id
    $sql .= " where tb_usuarios.id_usuario = '$documento' and estado_compra = '$detalles' "; // filtrando por el id del usuario y el estado de compra dados como parámetros

    $consulta = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consulta
    while($fila = $consulta->fetch_assoc()) // Recorre el resultado con un bucle while, asignando cada fila a la variable $fila como un array asociativo
    {
        $salida .= "<hr>"; // Concatena un elemento HTML de línea horizontal a la variable de salida
        $id_com = $fila['id_compra']; // Asigna el valor del campo id_compra de la fila actual a la variable $id_com
        $salida .= $fila['producto_nombre']."<br>"; // Concatena el nombre del producto y un salto de línea a la variable de salida
        $salida .="Color: ". $fila['producto_color']."<br>"; // Concatena el color del producto y un salto de línea a la variable de salida
        $salida .="Caracteristicas: ". $fila['producto_caracteristicas']."<br>"; // Concatena las características del producto y un salto de línea a la variable de salida
        $salida .="Precio: ". $fila['producto_precio']."<br>"; // Concatena el precio del producto y un salto de línea a la variable de salida
        if( $fila['estado_compra'] == "ag") // Si el estado de compra del producto es "ag" (agregado)
        {
            $salida .= "Estado del producto: el articulo esta agregado."."<br>"; // Concatena el estado del producto y un salto de línea a la variable de salida
            $salida .= "<a href='actualizacion.php?des=eli&com=$id_com&doc=$documento'>Eliminar</a>"."<br>"; // Concatena un elemento HTML de enlace que pasa el id de compra, el id del usuario y la acción de eliminar como parámetros a la variable de salida
            $salida .= "<a href='actualizacion.php?des=yes&com=$id_com&doc=$documento'>Continuar Compra</a>"."<br>"; // Concatena un elemento HTML de enlace que pasa el id de compra, el id del usuario y la acción de continuar compra como parámetros a la variable de salida
        }
        if ($fila['estado_compra'] == "co") // Si el estado de compra del producto es "co" (comprado)
        {
            $salida .= "Estado del producto: el articulo esta comprado"."<br>"; // Concatena el estado del producto y un salto de línea a la variable de salida
            $salida .= "<a href='actualizacion.php?des=fac&com=$id_com&doc=$documento'>Hacer factura</a>"."<br>"; // Concatena un elemento HTML de enlace que pasa el id de compra, el id del usuario y la acción de hacer factura como parámetros a la variable de salida
        }
        $salida .= "<hr>"; // Concatena un elemento HTML de línea horizontal a la variable de salida
    }
    $conexion->close(); // Cierra la conexión a la base de datos
    return $salida; // Devuelve la variable de salida como el resultado de la función
}


/**
 * Fucnion para agregar articulos al carrito de compra correspondiente 
 * @param num El primer parametro es el codigo del producto 
 * @param tex El segundo parametro es el detalle de la compra que se ha realizado 
 * @param num El tercer parametro es el id del usuario 
 * @return varchar retorna un mensaje si el producto fue agregado o comprado y muestra un enlace de regreso 
 */
function Compra($id_pro,$detalles,$documento) // Define la función con tres parámetros: el id del producto, el estado de compra y el id del usuario
{
    $salida = ""; // Inicializa la variable de salida como una cadena vacía
    require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
    $sql  = "insert into tb_compra(producto_id,id_usuario,carrito_id,estado_compra) values('$id_pro','$documento','$documento','$detalles')"; // Crea la consulta SQL que inserta un nuevo registro en la tabla tb_compra con los valores dados como parámetros
    $consulta = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consulta
    if($consulta) // Si la consulta se realizó con éxito
    {
        if($detalles == "ag") // Si el estado de compra es "ag" (agregado)
        {
            $salida .= "Se ha agregado a tu carrito de compras"."<br>"; // Concatena un mensaje de confirmación y un salto de línea a la variable de salida
            $salida .= "<a href='inicioPrincipal.php?doc=$documento&bus='>Volver al Inicio</a>"; // Concatena un elemento HTML de enlace que pasa el id del usuario y una cadena vacía como parámetros a la variable de salida
        }
        if($detalles == "co") // Si el estado de compra es "co" (comprado)
        {
            $salida .= "Se ha realizado la compra"."<br>"; // Concatena un mensaje de confirmación y un salto de línea a la variable de salida
            $salida .= "<a href='inicioPrincipal.php?doc=$documento&bus='>Volver al Inicio</a>"; // Concatena un elemento HTML de enlace que pasa el id del usuario y una cadena vacía como parámetros a la variable de salida
        }
    }
    $conexion->close(); // Cierra la conexión a la base de datos
    return $salida; // Devuelve la variable de salida como el resultado de la función
}

/**
 * Funcion para eliminar los datos del carrito de compras 
 * @param num El primer patrametro ingresado es el codigo de la compra 
 * @param num El segundo parametros es le documento del usuario 
 * @return varchar no retorna nada 
 */
function ElimiarCompra($id_com,$documento) // Define la función con dos parámetros: el id de la compra y el id del usuario
{
    $salida =""; // Inicializa la variable de salida como una cadena vacía
    require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
    $sql = "delete from tb_compra where id_compra='$id_com'"; // Crea la consulta SQL que elimina el registro de la tabla tb_compra donde el id de la compra sea igual al id dado
    $consulta = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consulta
    if($consulta) // Si la consulta se realizó con éxito
    {
        //echo "eliminado"; // Esta línea está comentada y no se ejecuta, podría mostrar un mensaje de confirmación
        header("location: carritoDeCompras.php?doc=$documento"); // Redirige al usuario a la página carritoDeCompras.php pasando el id del usuario como parámetro
    }
    $conexion->close(); // Cierra la conexión a la base de datos
    return $salida; // Devuelve la variable de salida como el resultado de la función
}

/**
 * Fucnion para sumar el presion de los porductos escojidos o comprados por el usuario
 * @param num el numero de documento del usuario
 * @param string un codigo para saber si el estado de la compra
 * @return string la suma de los produstos con  el numero de ello
 */
function SumarPrecios($documento,$detalles) // Define la función con dos parámetros: el id del usuario y el estado de compra de los productos
{
    $salida = ""; // Inicializa la variable de salida como una cadena vacía
    require("conexion.php"); // Incluye el archivo que contiene la conexión a la base de datos
    $sql = "select sum(tb_productos.producto_precio)as total,count(*) as productos from tb_compra "; // Crea la consulta SQL que selecciona la suma de los precios y el conteo de los productos de la tabla tb_compra
    $sql .= "inner join tb_productos on tb_compra.producto_id= tb_productos.producto_id "; // haciendo un join con la tabla tb_productos por el campo producto_id
    $sql .= "inner join tb_usuarios on tb_compra.id_usuario = tb_usuarios.id_usuario "; // haciendo un join con la tabla tb_usuarios por el campo id_usuario
    $sql .= "inner join tb_carrito on tb_carrito.carrito_id = tb_compra.carrito_id "; // haciendo un join con la tabla tb_carrito por el campo carrito_id
    $sql .= "where tb_usuarios.id_usuario = '$documento' and estado_compra = '$detalles' "; // filtrando por el id del usuario y el estado de compra dados como parámetros
    $consulta  = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado en la variable $consulta
    while($fila = $consulta->fetch_assoc()) // Recorre el resultado con un bucle while, asignando cada fila a la variable $fila como un array asociativo
    {
        $salida .="Productos: ". $fila['productos']." "; // Concatena el número de productos y un espacio a la variable de salida
        $salida.= "Total: ".$fila['total']; // Concatena el precio total de los productos a la variable de salida
    }
    $conexion->close(); // Cierra la conexión a la base de datos
    return $salida; // Devuelve la variable de salida como el resultado de la función
}

/**
 * Funcion que para la Informacion de usuario
 * @param num el documento de la persona
 * @return texto retorna los datos de la persona de la base de datos
 */
function inforUsuario($documento)// Esta función se llama inforUsuario y recibe un parámetro llamado $documento, que es el identificador de un usuario.
{
    
    $salida = "";// Inicializa una variable llamada $salida con una cadena vacía. Esta variable se usará para almacenar la información del usuario que se devolverá al final de la función.
    require("conexion.php");// Requiere el archivo conexion.php, que contiene el código para establecer una conexión con la base de datos.
    $sql= "select usuario_nombre,usuario_correo,usuario_contrasena from tb_usuarios where id_usuario = '$documento'"; // Crea una variable llamada $sql que contiene una consulta SQL para seleccionar el nombre, el correo y la contraseña del usuario cuyo id_usuario sea igual al valor de $documento.
    $consulta = $conexion->query($sql);//Ejecuta la consulta SQL usando el método query del objeto $conexion y almacena el resultado en una variable llamada $consulta.
    while($fila = $consulta->fetch_assoc())    // Recorre el resultado de la consulta usando un bucle while y el método fetch_assoc, que devuelve cada fila como un arreglo asociativo.

    {
        $salida .= "<hr>";// Añade un separador horizontal a la variable $salida.
        $salida .= "Nombre: ".$fila['usuario_nombre']."<br>";// Añade el nombre del usuario a la variable $salida, usando la clave 'usuario_nombre' del arreglo $fila.
        $salida .= "Correo: ".$fila['usuario_correo']."<br>";// Añade el correo del usuario a la variable $salida, usando la clave 'usuario_correo' del arreglo $fila.
        $salida .= "Contraseña: ".$fila['usuario_contrasena'];// Añade la contraseña del usuario a la variable $salida, usando la clave 'usuario_contrasena' del arreglo $fila.
    }
    $conexion->close(); // Cierra la conexión con la base de datos usando el método close del objeto $conexion.
     return $salida; // Devuelve el valor de la variable $salida, que contiene la información del usuario.
}

/**
 * Funcion que actualiza el estado de un producto por ejemplo
 * (si el producto esta comprado o agregado)
 * @param num el cadigo al mometo de guardar en el carrito
 * @param num documento de la persona
 * @return txt un texto de salida con un enlace
 */
function actualizarcompra($id_com,$documento)// Esta función se llama actualizarcompra y recibe dos parámetros llamados $id_com y $documento, que son el identificador de una compra y el identificador de un usuario, respectivamente.

{
    $salida = "";// Inicializa una variable llamada $salida con una cadena vacía. Esta variable se usará para almacenar el mensaje que se devolverá al final de la función.
    require("conexion.php");// Requiere el archivo conexion.php, que contiene el código para establecer una conexión con la base de datos.
    $sql  = "update tb_compra set estado_compra= 'co' where id_compra= '$id_com' and  id_usuario= '$documento'";// Crea una variable llamada $sql que contiene una consulta SQL para actualizar el estado de la compra cuyo id_compra sea igual al valor de $id_com y cuyo id_usuario sea igual al valor de $documento. El nuevo estado será 'co', que significa completado.
    $consulta = $conexion->query($sql);// Ejecuta la consulta SQL usando el método query del objeto $conexion y almacena el resultado en una variable llamada $consulta. El resultado será un valor booleano que indica si la consulta se realizó con éxito o no.
    if($consulta)// Si la consulta se realizó con éxito, es decir, si el valor de $consulta es verdadero...
    
    {
        $salida .= "Se ha realizado la compra"."<br>";// Añade un mensaje a la variable $salida, indicando que se ha realizado la compra.
        $salida .= "<a href='inicioPrincipal.php?doc=$documento&bus='>Volver al Inicio</a>";// Añade un enlace a la variable $salida, que permite al usuario volver al inicio. El enlace tiene como parámetros el valor de $documento y una cadena vacía, que se usarán para identificar al usuario y realizar una búsqueda, respectivamente.
        
    }
    $conexion->close();// Cierra la conexión con la base de datos usando el método close del objeto $conexion.
    return $salida; // Devuelve el valor de la variable $salida, que contiene el mensaje y el enlace.
    
}

/**
 * Funcion para contar las facturas que hay en la base de datos
 * @param num el cadigo al mometo de guardar en el carrito
 * @return num el numero de compras que hay con ese codigo
 */
function contarfacturas($id_com)// Esta función se llama contarfacturas y recibe un parámetro llamado $id_com, que es el identificador de una compra.
{
    $salida= 0; // Inicializa una variable llamada $salida con el valor 0. Esta variable se usará para almacenar el número de facturas que se devolverá al final de la función.
    require("conexion.php");// Requiere el archivo conexion.php, que contiene el código para establecer una conexión con la base de datos.
    $sql = "select count(id_compra) from tb_factura where id_compra='$id_com' ";// Crea una variable llamada $sql que contiene una consulta SQL para contar el número de facturas cuyo id_compra sea igual al valor de $id_com.
    $consulta = $conexion->query($sql);// Ejecuta la consulta SQL usando el método query del objeto $conexion y almacena el resultado en una variable llamada $consulta.
    while($fila = $consulta->fetch_array())// Recorre el resultado de la consulta usando un bucle while y el método fetch_array, que devuelve cada fila como un arreglo numérico.
    {
        $salida += $fila[0];// Suma el valor de la primera posición del arreglo $fila a la variable $salida. Este valor corresponde al número de facturas obtenido por la consulta SQL.
    }
    $conexion->close();// Cierra la conexión con la base de datos usando el método close del objeto $conexion.
    return $salida; // Devuelve el valor de la variable $salida, que contiene el número de facturas.
    
}

/**
 * Funcion que actualiza la factura  en la base de datos
 * @param num el cadigo al mometo de guardar en el carrito
 * @return num si se agrego o actualizo 1 de lo contrario 0
 */
function actalizarfactura($id_com)
// Esta función se llama actalizarfactura y recibe un parámetro llamado $id_com, que es el identificador de una compra.
{
    $salida= ""; // Inicializa una variable llamada $salida con una cadena vacía. Esta variable se usará para almacenar el valor que se devolverá al final de la función. El valor será 1 si se insertó una factura o 0 si no se pudo.
    require("conexion.php");// Requiere el archivo conexion.php, que contiene el código para establecer una conexión con la base de datos.
    $con = contarfacturas($id_com);// Llama a la función contarfacturas, que recibe el valor de $id_com como parámetro y devuelve el número de facturas asociadas a esa compra. Almacena el resultado en una variable llamada $con.
    if($con == 0)// Si el valor de $con es 0, es decir, si no hay ninguna factura asociada a la compra...
    {
        $sql = "insert into tb_factura(id_compra,cantidad)values('$id_com','1')";// Crea una variable llamada $sql que contiene una consulta SQL para insertar una nueva factura en la tabla tb_factura, con el valor de $id_com como id_compra y el valor 1 como cantidad.
        
        $consulta = $conexion->query($sql);// Ejecuta la consulta SQL usando el método query del objeto $conexion y almacena el resultado en una variable llamada $consulta. El resultado será un valor booleano que indica si la consulta se realizó con éxito o no.
        if($consulta)// Si la consulta se realizó con éxito, es decir, si el valor de $consulta es verdadero...
            {
                $salida .= 1;// Añade el valor 1 a la variable $salida, indicando que se insertó una factura.
            }else{// Si la consulta no se realizó con éxito, es decir, si el valor de $consulta es falso...
                $salida .= 0;// Añade el valor 0 a la variable $salida, indicando que no se pudo insertar una factura.
            }
    $conexion->close();// Cierra la conexión con la base de datos usando el método close del objeto $conexion.
    return $salida;// Devuelve el valor de la variable $salida, que contiene 1 o 0 según el resultado de la consulta SQL.
    }else{// Si el valor de $con no es 0, es decir, si ya hay una o más facturas asociadas a la compra...
        $salida .= 0;// Añade el valor 0 a la variable $salida, indicando que no se puede insertar una factura.
        
    }
}

/**
 * Funcion para mostar las facturas realizadas por el usuario
 * @param num el documento del usuario 
 * @param num el cadigo al mometo de guardar en el carrito
 * @return texto La factura del usuario 
 */
function mostrarfactura($documento,$id_com)// Esta función se llama mostrarfactura y recibe dos parámetros llamados $documento y $id_com, que son el identificador de un usuario y el identificador de una compra, respectivamente.
{
    // Inicializa una variable llamada $salida con una cadena vacía. Esta variable se usará para almacenar la información de la factura que se devolverá al final de la función.
    $salida = ""; 
    // Requiere el archivo conexion.php, que contiene el código para establecer una conexión con la base de datos.
    require("conexion.php");
    // Crea una variable llamada $sql que contiene una consulta SQL para seleccionar el id de la factura, el nombre del usuario, el nombre del producto, el precio del producto y la cantidad comprada, usando varias uniones entre las tablas tb_compra, tb_productos, tb_usuarios, tb_carrito y tb_factura, donde el id_usuario sea igual al valor de $documento y el id_compra sea igual al valor de $id_com.
    $sql = "select tb_factura.factura_id,tb_usuarios.usuario_nombre,tb_productos.producto_nombre, ";
    $sql .= "tb_productos.producto_precio,tb_factura.cantidad ";
    $sql .= " from tb_compra ";
    $sql .= " inner join tb_productos on tb_compra.producto_id= tb_productos.producto_id ";
    $sql .= " inner join tb_usuarios on tb_compra.id_usuario = tb_usuarios.id_usuario ";
    $sql .= " inner join tb_carrito on tb_carrito.carrito_id = tb_compra.carrito_id ";
    $sql .= " inner join tb_factura on  tb_compra.id_compra = tb_factura.id_compra ";
    $sql .= " where tb_usuarios.id_usuario = '$documento' and tb_compra.id_compra='$id_com' ";
    // Comenta la consulta SQL usando la función echo, que imprime el valor de la variable $sql en la pantalla. Esta línea está comentada con dos barras al inicio, lo que significa que no se ejecuta.
    //echo $sql;
    // Ejecuta la consulta SQL usando el método query del objeto $conexion y almacena el resultado en una variable llamada $consulta.
    $consulta = $conexion->query($sql);
    // Recorre el resultado de la consulta usando un bucle while y el método fetch_assoc, que devuelve cada fila como un arreglo asociativo.
    while($fila = $consulta->fetch_assoc())
    {
        // Añade un separador horizontal a la variable $salida.
        $salida.= "<hr>";
        // Añade el id de la factura a la variable $salida, usando la clave 'factura_id' del arreglo $fila.
        $salida.= $fila['factura_id']."<br>";
        // Añade el nombre del usuario a la variable $salida, usando la clave 'usuario_nombre' del arreglo $fila.
        $salida.="Nombre: ". $fila['usuario_nombre']."<br>";
        // Añade el nombre del producto a la variable $salida, usando la clave 'producto_nombre' del arreglo $fila.
        $salida.="Producto: ". $fila['producto_nombre']."<br>";
        // Añade el precio del producto a la variable $salida, usando la clave 'producto_precio' del arreglo $fila.
        $salida.="Valor: ".$fila['producto_precio']."<br>";
        // Añade la cantidad comprada a la variable $salida, usando la clave 'cantidad' del arreglo $fila.
        $salida.="Cantidad: ". $fila['cantidad']."<br>";
        // Añade otro separador horizontal a la variable $salida.
        $salida.= "<hr>";
        // Añade un enlace a la variable $salida, que permite al usuario regresar a la página de factura. El enlace tiene como parámetros el valor de $documento, que se usará para identificar al usuario.
        $salida.= "<a href='factura.php?doc=$documento'>Regresar</a>";

    }
    // Cierra la conexión con la base de datos usando el método close del objeto $conexion.
    $conexion->close();
    // Devuelve el valor de la variable $salida, que contiene la información de la factura.
    return $salida;

}
