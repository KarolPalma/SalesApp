<?php 
	include("../conexion.php");
 
	if (!$bdcon) //Si no es posible lograr la conexion devuelve un mensaje de error
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varIdCategoria = $_POST["idCategoria"];

        $sql = "SELECT * FROM Categorias WHERE Id_Categoria = " . $varIdCategoria . ";"; 
        
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idCategoria'] = $row['Id_Categoria'];
            $row_array['categoria'] = $row['Categoria'];
            $row_array['descripcion'] = $row['Descripcion'];
            $row_array['activo'] = filter_var($row['Activo'], FILTER_VALIDATE_BOOLEAN);
        }

        if(empty($row_array)){
            $row_array['idCategoria'] = "0";
        }
        
		echo json_encode($row_array, 256);
    }
?>