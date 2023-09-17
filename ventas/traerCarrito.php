<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varUsuarioActual = $_POST["idUsuario"];

        $sql = "SELECT * FROM Carrito WHERE Id_Usuario = " . $varUsuarioActual . ";"; 
        
        $arreglo = array();
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idUsuario'] = $row['Id_Usuario'];
            $row_array['idProducto'] = $row['Id_Producto'];
            $row_array['unidadesLlevadas'] = $row['Cantidad_Unidades'];
            $row_array['idDescuento'] = $row['Id_Descuento'];
            $row_array['idImpuesto'] = $row['Id_Impuesto'];

            array_push($arreglo, $row_array);
        }
		
        echo json_encode($arreglo, 256);
    }
?>