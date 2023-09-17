<?php 
    $id = $_GET['idFactura'];

    //Inicializacion de variables
    $fecha = '';
    $hora = '';
    $idAdmin = '';
    $nombreAdmin = '';
    $idUsuario = '';
    $correo = '';
    $latitud = '';
    $longitud = '';
    $metodoPago = '';
    $subtotal = '';
    $total = '';

    $sql = "SELECT * FROM v_Encabezado_Factura_Compras WHERE Id_Factura = '" . $id . "';"; 
    $result = mysqli_query($conexion, $sql); 
    while ($row = mysqli_fetch_assoc($result)) { 
        $fecha = $row["Fecha"]; 
        $hora = $row["Hora"];
        $idAdmin = $row["Id_Admin"];
        $nombreAdmin = $row["Nombre_Administrador"];
        $idUsuario = $row["Id_Usuario"];
        $correo = $row["Correo"];
        $latitud = $row["Latitud"];
        $longitud = $row["Longitud"];
        $metodoPago = $row["Metodo_Pago"];
        $subtotal = $row["SubTotal"];
        $total = $row["Total"];
    }
    //Con esto y al incluir este archivo php al pdf de facturas, es posible llamar a estas variables en cada campo e imprimirlas
?>