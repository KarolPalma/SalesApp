<?php //Archivo PHP que establece la conexion a la BD, para la conexion al 000webhost estas variables cambian de valor
	$servidor="localhost";
	$usuario="root";
	$clave="198103";
	$bd="sales_app";
	
	$bdcon = true;

	$conexion=mysqli_connect($servidor, $usuario, $clave, $bd); //Trata de generar la conexion mediante los datos traspasados

	if ($conexion -> connect_errno) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	$bdcon = false;
    	exit;
	}
	else //Y si se logra la conexion habilita los caracteres de UTF8 y la zona horaria que corresponde a Honduras (esto ultimo es para aplicarlo en el 000webhost)
	{
		mysqli_set_charset($conexion,"utf8");
		mysqli_query($conexion,"SET time_zone = '-06:00'");
	}
?>