<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $sql = "SELECT * FROM Categorias WHERE Activo = 1;"; 
        
        $arreglo = array();
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idCategoria'] = $row['Id_Categoria'];
            $row_array['categoria'] = $row['Categoria'];
            $row_array['descripcion'] = $row['Descripcion'];

            array_push($arreglo, $row_array);
        }
        
		echo json_encode($arreglo, 256);
    }
?>