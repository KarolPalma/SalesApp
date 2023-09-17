<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varIdProveedor = $_POST["idProveedor"];

        $sql = "SELECT * FROM v_Proveedores WHERE Id_Proveedor = " . $varIdProveedor . ";"; 
        
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idProveedor'] = $row['Id_Proveedor'];
            $row_array['nombre'] = $row['Nombre'];
            $row_array['contacto'] = $row['Contacto'];
            $row_array['telefono'] = $row['Telefono'];
            $row_array['correo'] = $row['Correo'];
            $row_array['direccion'] = $row['Direccion'];
            $row_array['estado'] = filter_var($row['Estado'], FILTER_VALIDATE_BOOLEAN);
        }

        if(empty($row_array)){
            $row_array['idProveedor'] = "0";
        }
        
		echo json_encode($row_array, 256);
    }
?>