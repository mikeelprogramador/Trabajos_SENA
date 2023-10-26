<?php 

$documento = $_GET['doc'];
$detalles = $_GET['des'];
$producto = $_GET['pro'];
include("funciones.php");

echo MostrarNombre($documento);

if($detalles == "ag")
{
    echo AgregarProducto($producto);
}

