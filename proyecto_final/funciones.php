<?php

function carrito($usuario){
    require("conexion.php");
    $salida ="";
    $imprimir = "SELECT tb_productos.producto_nombre
    from compra
    inner join tb_productos on compra.producto_id= tb_productos.producto_id
    inner join tb_usuarios on compra.id_usuario = tb_usuarios.id_usuario
    where tb_usuarios.usuario_correo = '$usuario'";
    $sql = $conexion->query("$imprimir");
    while($fila = $sql->fetch_assoc())
    {
        ?>
        <a href="index.php"><?php $salida.= $fila['producto_nombre']; ?></a>
        <?php
    }

    return $salida;


}


function existente($correo,$password){
    require("conexion.php");
    $imprimir = "SELECT * from tb_usuarios where usuario_correo='$correo' and usuario_contrasena='$password'";
    $sql = $conexion->query("$imprimir");
    if($datos = $sql->fetch_object())
    {
        header("location: index.php?id=$correo");
    }else{
       header("location: error.php");
    }
    $conexion->close();
    return $salida;
}

function id()
{
    require("conexion.php");
    $salida ="";
    $imprimir ="SELECT id_usuario
    from tb_usuarios
    where usuario_correo = 'calioo'";
    $sql = $conexion->query("$imprimir");
    while($fila= $sql->fetch_assoc)
    {
        $salida.= $fila['id_usuario'];
    }
    return $salida;
}