<?php 
$documento = $_GET['doc'];
include("funciones.php");

echo "Informacion Personal ";
?><a href="inicioPrincipal.php?doc=<?php echo $documento; ?>&bus=">Regresar</a> <?php
echo inforUsuario($documento);