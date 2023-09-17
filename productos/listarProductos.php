<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $sql = "SELECT * FROM v_Productos;"; 

        $arreglo = array();
        
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
            $row_array['nombreImpuesto'] = $row['Nombre_Impuesto'];
            $row_array['porcentajeImpuesto'] = $row['Porcentaje_Impuesto'];

            array_push($arreglo, $row_array);
        }
        
		echo json_encode($arreglo, 256);
    }
?>