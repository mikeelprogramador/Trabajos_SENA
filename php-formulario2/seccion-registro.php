<!-- El siguiente archivo solo es el formulario dde ingreso de datos
de un mini sitio para cálculo de notas.	
-->

<html>

	<head>
		<title>Regístrate</title>
	</head>

	<body>

		<?php include("menu.php"); ?>

		<form action="seccion-registrando.php" method="get">

			Documento<input type="text" name="documento"><br>
			Nombre<input type="text" name="nombre"><br>
			Fecha nacimiento<input type="text" name="fecha_nac"><br>
			<input type="submit" value="Registrar">

		</form>
	
	</body>

</html>