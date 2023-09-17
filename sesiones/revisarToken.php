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

		$varToken = isset($_POST['token']) ? $_POST['token'] : "";
		
        //Generacion de la consulta,
        $consulta = "CALL revisarToken('" . $varToken . "');";

        $result = mysqli_query($conexion, $consulta); //Ejecuta el query
        while($row=mysqli_fetch_assoc($result)) //Recorre la respuesta por cada registro
        {
            $respuesta = $row["Id_Usuario"]; //Si la respuesta es "SESION NO INICIADA" el token no es valido

            if(strcmp($respuesta, "SESION NO INICIADA") == 0){
                echo $respuesta;
                exit;
            }else{
                $row_array['idUsuario'] = $row['Id_Usuario'];
                $row_array['usuario'] = $row['Usuario'];
                $idRol = $row['Id_Rol'];

                if($idRol == 1){
                    $row_array['idAdmin'] = $row['ID'];
                }else{
                    $row_array['idCliente'] = $row['ID'];
                }

                echo json_encode($row_array, 256);
                exit;
            }
        }

	}
?>