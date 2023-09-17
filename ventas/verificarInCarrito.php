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
		$varIdProducto = isset($_POST['idProducto']) ? $_POST['idProducto'] : "";

        //Generacion de la consulta,
        if("" == trim($varIdProducto)){
            $consulta = "SELECT COUNT(*) AS C FROM Carrito WHERE Id_Usuario = '" . $varIdUsuario . "';";

            $respuesta = "No Existe";

            $result = mysqli_query($conexion, $consulta); 
            while($row=mysqli_fetch_assoc($result)) 
            {
                $c = $row["C"]; 
            }

            if($c > 0){
                $respuesta = "Existe";
            }

            echo $respuesta;
            
        }else{
            $consulta = "SELECT COUNT(*) AS C FROM Carrito WHERE Id_Usuario = '" . $varIdUsuario . "' AND Id_Producto = " . $varIdProducto . ";";

            $respuesta = "No Existe";

            $result = mysqli_query($conexion, $consulta); //Ejecuta el query
            while($row=mysqli_fetch_assoc($result)) //Recorre la respuesta por cada registro
            {
                $c = $row["C"]; //Si no hay registros c=0 pero si hay (el caso maximo es que haya un registro) c=1
            }

            if($c == 1){
                $respuesta = "Existe";
            }

            echo $respuesta;
        }
	}
?>