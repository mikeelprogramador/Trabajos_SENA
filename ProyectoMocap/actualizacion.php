<?php

$detalles = $_GET['des'];

include("funciones.php");

if($detalles == "ag")
{
    $documento = $_GET['doc'];
    $id_pro = $_GET['pro'];

    echo Compra($id_pro,$detalles,$documento);
}
if($detalles == "co")
{
    $documento = $_GET['doc'];
    $id_pro = $_GET['pro'];

    echo Compra($id_pro,$detalles,$documento);
}

if($detalles == "eli")
{
    $documento = $_GET['doc'];
    $id_com = $_GET['com'];

    echo ElimiarCompra($id_com,$documento);

}
