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
		$varIdProducto = $_POST["idProducto"];
    

		//Generacion de la consulta, llamando al SP
		$consulta = "CALL Delete_Producto_Carrito( " . $varIdUsuario . ",  " . $varIdProducto . ");";
		

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