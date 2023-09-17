<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $sql = "SELECT * FROM Metodos_Pago;"; 
        
        $arreglo = array();
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idMetodoPago'] = $row['Id_Metodo_Pago'];
            $row_array['metodoPago'] = $row['Metodo_Pago'];

            array_push($arreglo, $row_array);
        }
		
        echo json_encode($arreglo, 256);
    }
?>