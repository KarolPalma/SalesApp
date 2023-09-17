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

		$varIdUsuario = $_POST["idUsuario"];
		$varLatitud = $_POST["latitud"];
		$varLongitud = $_POST["longitud"];
		$varIdMetodoPago = $_POST["idMetodoPago"];
		//PARAMETROS BITACORA
		$varTipoDispositivo = $_POST["tipoDispositivo"];
		$varSistemaOperativo = $_POST["sistemaOperativo"];

		//Generacion de la consulta, llamando al SP
		$consulta = "CALL Insert_Factura_Compras(" . $varIdUsuario . ", " . $varLatitud . ", " . $varLongitud . ", 
					" . $varIdMetodoPago . ", '" . $varTipoDispositivo . "', '" . $varSistemaOperativo . "');";


		//Si la consulta se ejecuta correctamente hace otra consulta para devolver el id de la factura
		if ($resultado = mysqli_query($conexion, $consulta))
		{
			$consulta = "SELECT MAX(Id_Factura) AS ID FROM Facturas_Compras;";
			$result = mysqli_query($conexion, $consulta);
			
            while($row=mysqli_fetch_assoc($result))
            {
                $lastIdFactura = $row["ID"];
            }

            echo $lastIdFactura;

		} else 
		{
			echo 0;
		}
	}
?>