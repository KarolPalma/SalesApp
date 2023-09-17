<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $sql = "SELECT * FROM v_Clientes;"; 

        $arreglo = array();
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idCliente'] = $row['Id_Cliente'];
            $row_array['nombres'] = $row['Nombres'];
            $row_array['apellidos'] = $row['Apellidos'];
            $row_array['usuario'] = $row['Usuario'];
            $row_array['estado'] = filter_var($row['Estado'], FILTER_VALIDATE_BOOLEAN);

            array_push($arreglo, $row_array);
        }
        
		echo json_encode($arreglo, 256);
    }
?>