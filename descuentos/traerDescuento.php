<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varIdDescuento = $_POST["idDescuento"];
        $sql = "SELECT * FROM v_LlenarDescuentos WHERE Id_Descuento = " . $varIdDescuento . ";"; 
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idDescuento'] = $row['Id_Descuento'];
            $row_array['nombreDescuento'] = $row['Nombre_Descuento'];
            $row_array['porcentajeDescuento'] = $row['Porcentaje_Descuento'];
        }
        
		echo json_encode($row_array, 256);
    }
?>