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

		$varUsuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
        $varClave = isset($_POST['clave']) ? $_POST['clave'] : "";
		
        //Generacion de la consulta,
        $consulta = "CALL LOGIN('" . $varUsuario . "', '" . $varClave . "');";

        $result = mysqli_query($conexion, $consulta); //Ejecuta el query
        while($row=mysqli_fetch_assoc($result)) //Recorre la respuesta por cada registro
        {
            $respuesta = $row["Token"]; //Si no hay registros c=0 pero si hay (el caso maximo es que haya un registro) c=1
        }

        echo $respuesta;

	}
?>