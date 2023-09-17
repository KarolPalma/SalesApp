<?php //Inclusion de archivo de conexion
	include("../conexion.php");

	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
		//Recuperacion de los parametros enviados por POST

		$varNombre = $_POST["nombre"];
		$varDescripcion = $_POST["descripcion"];
		$varIdCategoria = $_POST["idCategoria"];
		$varIdProveedor = $_POST["idProveedor"];
		$varCantidadUnidad = $_POST["cantidadUnidad"];
		$varUnidadesAlmacen = $_POST["unidadesAlmacen"];
		$varCantidadMinima = $_POST["cantidadMinima"];
		$varCantidadMaxima = $_POST["cantidadMaxima"];
		$varFoto = $_POST["foto"];
		$varPrecio = $_POST["precio"];
		$varIdImpuesto = $_POST["idImpuesto"];
		//PARAMETROS BITACORA
		$varUsuarioActual = $_POST["usuarioActual"];
		$varTipoDispositivo = $_POST["tipoDispositivo"];
		$varSistemaOperativo = $_POST["sistemaOperativo"];

		if(strcmp($varFoto, "null") == 0 || is_null($varFoto)){
			//Generacion de la consulta, llamando al SP
			$consulta = "CALL Insert_Producto('" . $varNombre . "', '" . $varDescripcion . "', " . $varIdCategoria . ", 
			" . $varIdProveedor . ", '" . $varCantidadUnidad . "', " . $varUnidadesAlmacen . ", " . $varCantidadMinima . ", 
			" . $varCantidadMaxima . ", null, " . $varPrecio . ", " . $varIdImpuesto . ", 
			" . $varUsuarioActual . ", '" . $varTipoDispositivo . "', '" . $varSistemaOperativo . "');";

		}else{
			//Generacion de la consulta, llamando al SP
			$consulta = "CALL Insert_Producto('" . $varNombre . "', '" . $varDescripcion . "', " . $varIdCategoria . ", 
			" . $varIdProveedor . ", '" . $varCantidadUnidad . "', " . $varUnidadesAlmacen . ", " . $varCantidadMinima . ", 
			" . $varCantidadMaxima . ", '" . $varFoto . "', " . $varPrecio . ", " . $varIdImpuesto . ", 
			" . $varUsuarioActual . ", '" . $varTipoDispositivo . "', '" . $varSistemaOperativo . "');";

		}

		//Si la consulta se ejecuta correctamente devuelve un 1
		if ($resultado = mysqli_query($conexion, $consulta))
		{
			echo 1;
		} else 
		{
			echo 0;
		}
	}
?>