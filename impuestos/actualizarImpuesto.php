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

		$varIdImpuesto = $_POST["idImpuesto"];
		$varNombreImpuesto = $_POST["nombreImpuesto"];
		$varValorImpuesto = $_POST["valorImpuesto"]; //0.0 a 1.0
		//PARAMETROS BITACORA
		$varUsuarioActual = $_POST["usuarioActual"];
		$varTipoDispositivo = $_POST["tipoDispositivo"];
		$varSistemaOperativo = $_POST["sistemaOperativo"];
    

		//Generacion de la consulta, llamando al SP
		$consulta = "CALL Update_Impuesto( " . $varIdImpuesto . ", '" . $varNombreImpuesto . "', " . $varValorImpuesto . ", 
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