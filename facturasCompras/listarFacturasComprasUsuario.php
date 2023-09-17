<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varIdUsuario = $_POST["idUsuario"];

        $sql = "SELECT * FROM v_Encabezado_Factura_Compras WHERE Id_Usuario = " . $varIdUsuario . ";"; 

        $arreglo = array();

        $result = mysqli_query($conexion, $sql); 
        while ($row = mysqli_fetch_assoc($result)) { 
            $row_array['idFactura'] = $row["Id_Factura"];
            $row_array['fecha'] = $row["Fecha"]; 
            $row_array['hora'] = $row["Hora"];
            $row_array['idPersona'] = $row["Id_Admin"];
            $row_array['nombre'] = $row["Nombre_Administrador"];
            $row_array['idUsuario'] = $row["Id_Usuario"];
            $row_array['correo'] = $row["Correo"];
            $row_array['latitud'] = $row["Latitud"];
            $row_array['longitud'] = $row["Longitud"];
            $row_array['metodoPago'] = $row["Metodo_Pago"];
            $row_array['subtotal'] = $row["SubTotal"];
            $row_array['total'] = $row["Total"];

            array_push($arreglo, $row_array);
        }
        
		echo json_encode($arreglo, 256);
    }
?>