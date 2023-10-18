<?php

	include("funciones.php");
	activar_errores();
	$documento  = $_GET['doc'];

?>

<html>
    <head>
        <title>Consulta individual.</title>
    </head>

    <body>

		<?php
			include("menu.php");

			echo consultar_personas( $documento  );
		?>
        
    </body>

</html>