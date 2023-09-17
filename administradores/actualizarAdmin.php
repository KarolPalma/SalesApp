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

		$varIdAdmin = $_POST["idAdmin"];
		$varIdentificacion = $_POST["identificacion"];
		$varNombres = $_POST["nombres"];
		$varApellidos = $_POST["apellidos"];
		$varTelefono = $_POST["telefono"];
		$varFechaNacimiento = $_POST["nacimiento"];
		//PARAMETROS USUARIO
		$P_USUARIO = $_POST["usuario"];
		$P_CORREO = $_POST["correo"];
		$P_CLAVE = $_POST["clave"];
		$P_ESTADO = $_POST["estado"];
		//PARAMETROS BITACORA
		$varUsuarioActual = $_POST["usuarioActual"];
		$varTipoDispositivo = $_POST["tipoDispositivo"];
		$varSistemaOperativo = $_POST["sistemaOperativo"];
    

		//Generacion de la consulta, llamando al SP
		$consulta = "CALL Update_Administrador( " . $varIdAdmin . ", '" . $varIdentificacion . "', '" . $varNombres . "', '" . $varApellidos . "', 
					'" . $varTelefono . "', '" . $varFechaNacimiento . "', '" . $P_USUARIO . "', '" . $P_CORREO . "',
					'" . $P_CLAVE . "', " . $P_ESTADO . ", " . $varUsuarioActual . ", '" . $varTipoDispositivo . "', '" . $varSistemaOperativo . "');";


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