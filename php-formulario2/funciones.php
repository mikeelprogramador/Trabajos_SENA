<?php

	/**
	 * Activa la vista de errores en el servidor xampp
	 * php 8 versión para Mac.
	 * Como  no mostraba errores,no se sabía cómo corregirlos.
	 */
	function activar_errores(){

		ini_set('display_errors', 1); //Para mostrar los errores.
		ini_set('display_startup_errors', 1); //Para mostrar los errores.
		error_reporting(E_ALL); //Para mostrar los errores.
	}

	/**
	 * Se encarga de registrar a un estudiante
	 * @param		texto		Identificación de la persona.
	 * @param		texto		Nombre de la persona.
	 * @param 		fecha		Fecha de su nacimiento.
	 * @return		número		1 o 0 si éxito o no registro.
	 */
	function registrar_persona($documento, $nombre, $fecha_nac){

		include( "config.php" );

		$salida = 0;
		
		$conexion = mysqli_connect( $servidor, $usuario, $clave, $base_datos );
		$sql  = "insert into tb_estudiantes( documento, nombre, fecha_nac )";
		$sql .= "values( '$documento', '$nombre', '$fecha_nac' )";
		//echo $sql;

		try {
		
			$resultado = $conexion->query( $sql );

		}catch (mysqli_sql_exception $e){
			//var_dump( $e );
			//echo $e->getMessage(); //Imprimie el error.
		}
		
		//Se una fila ha sido afecta, agregada, marque...
		if($conexion->affected_rows > 0){

			$salida = 1; //éxito.

		}else{

			$salida = 0; //fracaso agregando fila.
		}

		$conexion->close(); //Cerramos la conexion.

		return $salida; //La función retorna.
	}

	/**
	 * Se encarga de encontrar a una persona.
	 * @param		texto		Identificación de una persona,
	 * @return		Número		Cero si no, o un número mayor que cero si encontró a una persona.
	 */
	function encontrar_persona($documento){

		include( "config.php" ); //Pilas, solo debe incluirse un config.

		$salida = 0;
		
		$conexion = mysqli_connect( $servidor, $usuario, $clave, $base_datos );
		$sql  = "select count(*) from tb_estudiantes where documento = '$documento'";
		$resultado = $conexion->query( $sql );
		//echo $sql;

		//En caso de uno o varios resultados, todos los registros se recorrerán 
		//por medio de este ciclo while.
		while( $fila = mysqli_fetch_array( $resultado ) ){

			$salida = $fila[0];
		}

		$conexion->close();

		return $salida;
	}

	/**
	 * Se encarga de mostrar a todas las personas. Usa fech assoc en  lugar de fetch array.
	 * @return		texto		Texto que representa html.	
	 */
	function consultar_personas( $doc_buscado = null ){

		include( "config.php" ); //Pilas, solo debe incluirse un config.

		$salida = ""; //Al retornar texto se inicializa con vacío.
		
		$conexion = mysqli_connect( $servidor, $usuario, $clave, $base_datos );
		$sql  = "select * from tb_estudiantes ";
		if( $doc_buscado != null  ) $sql .= " where documento = '$doc_buscado' ";
		$resultado = $conexion->query( $sql );
		//echo $sql;

		//Ojo, se usa el ciclo while pero con fetch assoc para llamar el nombre de los campos.
		while( $fila = mysqli_fetch_assoc( $resultado ) ){

			$doc = $fila['documento']; 
			
			if( $doc_buscado == null ){

				$salida .= $doc." <a href='seccion-consulta-individual.php?doc=$doc'>".$fila['nombre']."</a>";

			}else{

				$salida .= "<h1>".$fila['nombre']."</h1>";
				$salida .= "<hr>";
				$salida .= $fila['nota1']." ".$fila['nota2']." ".$fila['nota3'];

			}

			$salida .= "<br>";
		}

		$conexion->close();

		return $salida;
	}

