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

        $sql = "SELECT * FROM v_Impuesto WHERE Id_Impuesto = " . $varIdImpuesto . ";"; 
        
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idImpuesto'] = $row['Id_Impuesto'];
            $row_array['nombreImpuesto'] = $row['Nombre_Impuesto'];
            $row_array['valorImpuesto'] = $row['Valor_Impuesto'];
        }

        if(empty($row_array)){
            $row_array['idCategoria'] = "0";
        }
        
		echo json_encode($row_array, 256);
    }
?>