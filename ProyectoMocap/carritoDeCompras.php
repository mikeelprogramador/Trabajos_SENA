<?php 

$documento = $_GET['doc'];
include("funciones.php");

echo MostrarNombre($documento);
echo "Tu carrito de compras";
echo MostrarCarrito($documento);


