<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varIdProducto = $_POST["idProducto"];

        $sql = "SELECT * FROM v_Productos WHERE Id_Producto = " . $varIdProducto . ";"; 
        
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idProducto'] = $row['Id_Producto'];
            $row_array['nombre'] = $row['Nombre'];
            $row_array['descripcion'] = $row['Descripcion'];
            $row_array['idCategoria'] = $row['Id_Categoria'];
            $row_array['categoria'] = $row['Categoria'];
            $row_array['idProveedor'] = $row['Id_Proveedor'];
            $row_array['proveedor'] = $row['Proveedor'];
            $row_array['cantidadUnidad'] = $row['Cantidad_Unidad'];
            $row_array['unidadesAlmacen'] = $row['Unidades_Almacen'];
            $row_array['cantidadMinima'] = $row['Cantidad_Minima'];
            $row_array['cantidadMaxima'] = $row['Cantidad_Maxima'];
            $row_array['foto'] = $row['Foto'];
            $row_array['estado'] = filter_var($row['Estado'], FILTER_VALIDATE_BOOLEAN);
            $row_array['precio'] = $row['Precio'];
            $row_array['idImpuesto'] = $row['Id_Impuesto'];
        }

        if(empty($row_array)){
            $row_array['idProducto'] = "0";
        }
        
		echo json_encode($row_array, 256);
    }
?>