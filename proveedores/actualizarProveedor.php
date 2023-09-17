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

		$varIdProveedor = $_POST["idProveedor"];
		$varNombre = $_POST["nombre"];
		$varContacto = $_POST["contacto"];
        $varTelefono = $_POST["telefono"];
        $varCorreo = $_POST["correo"];
        $varDireccion = $_POST["direccion"];
        $varEstado = $_POST["estado"];

		//PARAMETROS BITACORA
		$varUsuarioActual = $_POST["usuarioActual"];
		$varTipoDispositivo = $_POST["tipoDispositivo"];
		$varSistemaOperativo = $_POST["sistemaOperativo"];
    

		//Generacion de la consulta, llamando al SP
		$consulta = "CALL Update_Proveedor( " . $varIdProveedor . ", '" . $varNombre . "', '" . $varContacto . "', '" . $varTelefono . "', 
                    '" . $varCorreo . "', '" . $varDireccion . "', 0, 0, " . $varEstado . ",
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