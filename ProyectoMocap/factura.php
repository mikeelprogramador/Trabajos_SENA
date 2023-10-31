<?php

$documento = $_GET['doc'];
include("funciones.php");

echo "Porductos comprados ";
?><a href="inicioPrincipal.php?doc=<?php echo $documento; ?>&bus=">Regresar</a> <?php
echo MostrarCarrito($documento,"co"); 
echo SumarPrecios($documento,"co"); 