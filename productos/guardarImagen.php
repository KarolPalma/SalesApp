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

        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str);
		
        $varId = $json_obj->id;
        $varFoto = $json_obj->foto;

        if($varId == 0){

            if(strcmp($varFoto, "null") == 0 || is_null($varFoto)){
                //Generacion de la consulta, llamando al SP
                $consulta = "CALL fotoProducto('null');";
    
            }else{
                //Generacion de la consulta, llamando al SP
                $consulta = "CALL fotoProducto('" . $varFoto . "');";
    
            }    
        } else {

            if(strcmp($varFoto, "null") == 0 || is_null($varFoto)){
                //Generacion de la consulta, llamando al SP
                $consulta = "UPDATE Productos SET Foto = null WHERE Id_Producto = " . $varId . "; ";
    
            }else{
                //Generacion de la consulta, llamando al SP
                $consulta = "UPDATE Productos SET Foto = '" . $varFoto . "' WHERE Id_Producto = " . $varId . "; ";
            }
        }
		
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