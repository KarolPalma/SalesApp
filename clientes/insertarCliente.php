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

		$varIdentificacion = $_POST["identificacion"];
		$varNombres = $_POST["nombres"];
		$varApellidos = $_POST["apellidos"];
		$varTelefono = $_POST["telefono"];
		$varFechaNacimiento = $_POST["nacimiento"];
		$varDireccion = $_POST["direccion"];
		$varLatitud = $_POST["latitud"];
		$varLongitud = $_POST["longitud"];
		//PARAMETROS USUARIO
		$P_USUARIO = $_POST["usuario"];
		$P_CORREO = $_POST["correo"];
		$P_CLAVE = $_POST["clave"];
		//PARAMETROS BITACORA
		$varUsuarioActual = $_POST["usuarioActual"];
		$varTipoDispositivo = $_POST["tipoDispositivo"];
		$varSistemaOperativo = $_POST["sistemaOperativo"];

		//Generacion de la consulta, llamando al SP
		$consulta = "CALL Insert_Cliente('" . $varIdentificacion . "', '" . $varNombres . "', '" . $varApellidos . "', 
					'" . $varTelefono . "', '" . $varFechaNacimiento . "', '" . $varDireccion . "', " . $varLatitud . ", 
					" . $varLongitud . ", '" . $P_USUARIO . "', '" . $P_CORREO . "', '" . $P_CLAVE . "', 
					" . $varUsuarioActual . ", '" . $varTipoDispositivo . "', '" . $varSistemaOperativo . "');";


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