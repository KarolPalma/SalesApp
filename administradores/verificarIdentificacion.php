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

		$varIdentificacion = $_POST["identificacion"];
		$varIdAdmin = isset($_POST['idAdmin']) ? $_POST['idAdmin'] : "";
        
        if("" == trim($varIdAdmin)){
            //Generacion de la consulta,
            $consulta = "SELECT COUNT(*) AS C FROM Administradores WHERE Identificacion = '" . $varIdentificacion . "';";

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
            
            $varIdAdmin = $_POST["idAdmin"];

            //Generacion de la consulta,
            $consulta = "SELECT COUNT(*) AS C FROM Administradores WHERE Identificacion = '" . $varIdentificacion . "' AND Id_Admin <> " . $varIdAdmin . ";";

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