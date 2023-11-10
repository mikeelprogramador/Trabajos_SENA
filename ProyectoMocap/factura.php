<?php

$documento = $_GET['doc'];//documento de la persona 
include("funciones.php");//inclusion de el archivo funciones

echo "Porductos comprados ";
?><a href="inicioPrincipal.php?doc=<?php echo $documento; ?>&bus=">Regresar</a> <?php
//enlace para regresar al menu principal
echo MostrarCarrito($documento,"co"); 
//para mostar las compras
echo SumarPrecios($documento,"co"); 
//para mostar el presion de los productos
