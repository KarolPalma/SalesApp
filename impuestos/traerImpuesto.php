<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varIdImpuesto = $_POST["idImpuesto"];
        $sql = "SELECT * FROM v_LlenarImpuestos WHERE Id_Impuesto = " . $varIdImpuesto . ";"; 
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idImpuesto'] = $row['Id_Impuesto'];
            $row_array['nombreImpuesto'] = $row['Nombre_Impuesto'];
            $row_array['porcentajeImpuesto'] = $row['Porcentaje_Impuesto'];
        }
        
		echo json_encode($row_array, 256);
    }
?>