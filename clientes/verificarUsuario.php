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

		$varUsuario = $_POST["usuario"];
        $varIdCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : "";
		
        if("" == trim($varIdCliente)){
            //Generacion de la consulta,
            $consulta = "SELECT COUNT(*) AS C FROM Usuarios WHERE Usuario = '" . $varUsuario . "';";

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

        } else {
            
            $varIdCliente = $_POST["idCliente"];

            //Generacion de la consulta,
            $consulta = "SELECT COUNT(*) AS C FROM Usuarios AS U
                         INNER JOIN Clientes AS C
                         ON C.Id_Usuario = U.Id_Usuario
                         WHERE U.Usuario = '" . $varUsuario . "' AND C.Id_Cliente <> " . $varIdCliente . ";";

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