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

		$varUsuarioActual = $_POST["idUsuario"];
		$varIdProducto = $_POST["idProducto"];
		$varUnidadesLlevadas = $_POST["unidadesLlevadas"];
		$varIdDescuento = $_POST["idDescuento"];

		//Generacion de la consulta, llamando al SP
		$consulta = "CALL Insert_Producto_Carrito(" . $varUsuarioActual . ", " . $varIdProducto . ", " 
												    . $varUnidadesLlevadas . ", " . $varIdDescuento . ");";


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