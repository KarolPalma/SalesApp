<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $sql = "SELECT * FROM v_Proveedores;"; 

        $arreglo = array();
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idProveedor'] = $row['Id_Proveedor'];
            $row_array['nombre'] = $row['Nombre'];
            $row_array['contacto'] = $row['Contacto'];
            $row_array['telefono'] = $row['Telefono'];
            $row_array['correo'] = $row['Correo'];
            $row_array['direccion'] = $row['Direccion'];
            $row_array['estado'] = filter_var($row['Estado'], FILTER_VALIDATE_BOOLEAN);

            array_push($arreglo, $row_array);
        }
        
		echo json_encode($arreglo, 256);
    }
?>