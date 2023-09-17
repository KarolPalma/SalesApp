<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $sql = "SELECT * FROM v_LlenarProveedores;"; 
        
        $arreglo = array();
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idProveedor'] = $row['Id_Proveedor'];
            $row_array['nombre'] = $row['Nombre'];

            array_push($arreglo, $row_array);
        }
        
		echo json_encode($arreglo, 256);
    }
?>