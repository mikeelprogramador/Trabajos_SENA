<?php

	include("funciones.php");

	activar_errores();

	$documento 		= $_GET['documento'];
	$nombre 		= $_GET['nombre'];
	$fecha_nac 		= $_GET['fecha_nac'];
	
	$grabacion = 0;
	
	//Buscaremos que el documento o la persona no esté registrada.
	//Para saber más de este paso, vaya al achivo funciones.
	if( encontrar_persona( $documento ) == 0 ){
		
		//Registra a la persona y avis al usuario.
		$grabacion = registrar_persona($documento, $nombre, $fecha_nac);

		if( $grabacion == 1 ){

			//echo "El registro fue exitoso. Puedes ir a tu perfil.";
			header( "location: seccion-informe.php" );
	
		}else{
	
			//Esto es texto javascript escrito desde PHP.
			echo "Error: vuelve a intentar registrarte. <a href='index.php'>Registro</a>";
			//header( "location: index.php" ); //Volvemos al inicio.
		}

	}else{
		echo "El estudiante ya se encuentra registrado <a href='index.php'>Registro</a>";
	}