<?php

$documento = $_GET['doc'];
include("funciones.php");

echo MostrarNombre($documento);

echo actualizarcarro($documento);

?> <a href="carritoDeCompras.php?doc=<?php echo $documento; ?>&des=a">Carrito</a><br><?php



echo MostrarProductos($documento);