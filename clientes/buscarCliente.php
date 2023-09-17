<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varIdCliente = $_POST["idCliente"];

        $sql = "SELECT * FROM v_Cliente WHERE Id_Cliente = " . $varIdCliente . ";"; 
        
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idCliente'] = $row['Id_Cliente'];
            $row_array['identificacion'] = $row['Identificacion'];
            $row_array['nombres'] = $row['Nombres'];
            $row_array['apellidos'] = $row['Apellidos'];
            $row_array['telefono'] = $row['Telefono'];
            $row_array['fechaNacimiento'] = $row['Fecha_Nacimiento'];
            $row_array['direccion'] = $row['Direccion'];
            $row_array['latitud'] = $row['Latitud'];
            $row_array['longitud'] = $row['Longitud'];
            $row_array['idUsuario'] = $row['Id_Usuario'];
            $row_array['usuario'] = $row['Usuario'];
            $row_array['correo'] = $row['Correo'];
            $row_array['clave'] = $row['Clave'];
            $row_array['estado'] = filter_var($row['Estado'], FILTER_VALIDATE_BOOLEAN);
        }

        if(empty($row_array)){
            $row_array['idCliente'] = "0";
        }
        
		echo json_encode($row_array, 256);
    }
?>