<?php

//Una variable que extrae los detalles del articulo por la URL
$detalles = $_GET['des'];

include("funciones.php");
//inclucion de el archivo funciones 

if($detalles == "ag")
{
    $documento = $_GET['doc'];//El documento del ususario extraido por URl
    $id_pro = $_GET['pro'];//El codigo del producto extraido por URl

    echo Compra($id_pro,$detalles,$documento);
    //guarda los datos de la compra realiza en el carrito correspondiante
}
if($detalles == "co")
{
    $documento = $_GET['doc'];//El documento del ususario extraido por URl
    $id_pro = $_GET['pro'];//El codigo del producto extraido por URl

    echo Compra($id_pro,$detalles,$documento);
    //guarda los datos de la compra realiza en el carrito correspondiante
}

if($detalles == "eli")
{
    $documento = $_GET['doc'];//El documento del ususario extraido por URl
    $id_com = $_GET['com'];//El codigo del la compra extraido por URl

    echo ElimiarCompra($id_com,$documento);
    //Una funcion que solo elimina los articulos agregador 
    //al carrito por el usuario

}
if ($detalles == "yes")
{
    $documento = $_GET['doc'];//El documento del ususario extraido por URl
    $id_com = $_GET['com'];//El codigo del la compra extraido por URl
    echo actualizarcompra($id_com,$documento);
}
if($detalles == "fac")
{
    $documento = $_GET['doc'];//El documento del ususario extraido por URl
    $id_com = $_GET['com'];//El codigo del la compra extraido por URl
    if(actalizarfactura($id_com) == 1)
    {
        echo mostrarfactura($documento,$id_com);
    }else
    {
        echo mostrarfactura($documento,$id_com);
    }
}
