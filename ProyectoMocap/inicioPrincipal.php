<?php

$documento = $_GET['doc'];
include("funciones.php");

echo MostrarNombre($documento);

echo actualizarcarro($documento);

?> <a href="carritoDeCompras.php?doc=<?php echo $documento; ?>">Carrito</a><br><br>
    <a href="index.php">Cerrar sesion</a>
<?php



echo MostrarProductos($documento);