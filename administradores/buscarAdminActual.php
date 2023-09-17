<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varIdUsuario = $_POST["idUsuario"];

        $sql = "SELECT * FROM v_Administrador WHERE Id_Usuario = " . $varIdUsuario . ";"; 
        
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idAdmin'] = $row['Id_Admin'];
            $row_array['identificacion'] = $row['Identificacion'];
            $row_array['nombres'] = $row['Nombres'];
            $row_array['apellidos'] = $row['Apellidos'];
            $row_array['telefono'] = $row['Telefono'];
            $row_array['fechaNacimiento'] = $row['Fecha_Nacimiento'];
            $row_array['idUsuario'] = $row['Id_Usuario'];
            $row_array['usuario'] = $row['Usuario'];
            $row_array['correo'] = $row['Correo'];
            $row_array['clave'] = $row['Clave'];
            $row_array['estado'] = filter_var($row['Estado'], FILTER_VALIDATE_BOOLEAN);
        }

        if(empty($row_array)){
            $row_array['idAdmin'] = "0";
        }
        
		echo json_encode($row_array, 256);
    }
?>