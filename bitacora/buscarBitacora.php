<?php 
	include("../conexion.php");
 
	if (!$bdcon)
	{
    	echo "Lo sentimos, este sitio está experimentando problemas";
    	exit;
	}
	else
	{
        $varFecha = $_POST["fecha"];

        $sql = "SELECT * FROM v_Bitacora WHERE Fecha = '" . $varFecha . "';"; 

        $arreglo = array();
        
    	$result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $row_array['idRegistro'] = $row['Id_Registro'];
            $row_array['usuario'] = $row['Usuario'];
            $row_array['tipoDispositivo'] = $row['Tipo_Dispositivo'];
            $row_array['sistemaOperativo'] = $row['Sistema_Operativo'];
            $row_array['fecha'] = $row['Fecha'];
            $row_array['hora'] = $row['Hora'];
            $row_array['detalle'] = $row['Detalle'];

            array_push($arreglo, $row_array);
        }

        if(empty($arreglo)){
            $row_array['idRegistro'] = "0";
        }
        
		echo json_encode($arreglo, 256);
    }
?>