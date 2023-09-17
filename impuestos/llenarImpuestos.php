<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $sql = "SELECT * FROM v_LlenarImpuestos;"; 
        
        $arreglo = array();
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idImpuesto'] = $row['Id_Impuesto'];
            $row_array['nombreImpuesto'] = $row['Nombre_Impuesto'];
            $row_array['porcentajeImpuesto'] = $row['Porcentaje_Impuesto'];

            array_push($arreglo, $row_array);
        }
        
		echo json_encode($arreglo, 256);
    }
?>