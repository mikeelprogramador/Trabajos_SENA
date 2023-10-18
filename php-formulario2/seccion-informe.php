<?php

	/*ini_set('display_errors', 1); //Para mostrar los errores.
	ini_set('display_startup_errors', 1); //Para mostrar los errores.
	error_reporting(E_ALL); //Para mostrar los errores.*/

	include("funciones.php");
?>

<!-- El siguiente archivo solo es el formulario dde ingreso de datos
de un mini sitio para cálculo de notas.	
-->

<html>

	<head>
		<title>Regístrate</title>
	</head>

	<body>

		<?php

			include("menu.php");
			echo consultar_personas();

		?>
	
	</body>

</html>