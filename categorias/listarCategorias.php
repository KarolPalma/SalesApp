<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $sql = "SELECT * FROM Categorias;"; 

        $arreglo = array();
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idCategoria'] = $row['Id_Categoria'];
            $row_array['categoria'] = $row['Categoria'];
            $row_array['descripcion'] = $row['Descripcion'];
            $row_array['activo'] = filter_var($row['Activo'], FILTER_VALIDATE_BOOLEAN);

            array_push($arreglo, $row_array);
        }
        
		echo json_encode($arreglo, 256);
    }
?>