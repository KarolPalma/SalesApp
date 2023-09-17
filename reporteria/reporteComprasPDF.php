<?php
require('../recursos/fpdf/fpdf.php');

require('../conexion.php');

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->SetTitle('Reporte de Compras del ' . date('d-m-Y'));
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(58);
$pdf->Cell(40, 10, 'Reporte de Compras del ' . date('d-m-Y'));
$pdf->Ln(20);

$x = $pdf->GetX();
$y = $pdf->GetY();

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(1, 1, 1);
$pdf->SetXY($x + 10, $y);
$pdf->Cell(40, 10, 'Usuario Solicitante: ');
$pdf->SetXY($x + 110, $y);
$pdf->Cell(40, 10, 'Fecha: ');
$pdf->SetXY($x + 150, $y);
$pdf->Cell(40, 10, 'Hora: ');

$x = 10;
$y = 30;
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY($x + 45, $y);

$varIdUsuario = $_GET['idUsuario'];
$consulta = "SELECT * FROM v_Administrador WHERE Id_Usuario = " . $varIdUsuario . ";"; 
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_assoc($resultado)) {
    $pdf->Cell(40, 10, utf8_decode($row["Nombres"] . " " . $row["Apellidos"]));
}

$pdf->SetXY($x + 125, $y);
$pdf->Cell(40, 10, date('d-m-Y'));
$pdf->SetXY($x + 165, $y);
$pdf->Cell(40, 10, date('h:i a'));

$pdf->SetFont('Arial', 'B', 10);
$y = $y + 20;
$consulta = "SELECT * FROM v_Encabezado_Factura_Compras WHERE Fecha = '" . date('Y-m-d') . "';";

$resultado = mysqli_query($conexion, $consulta);

$totalDia = 0.00;

if (mysqli_num_rows($resultado) != 0) {
    $pdf->SetXY($x + 73, $y);
    $pdf->Cell(40, 10, 'Listado de Facturas de Compras');
    $pdf->Ln(12);

    $pdf->Cell(6);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(20, 10, 'No. Factura', 1, 0, 'C', 0);
    $pdf->Cell(22, 10, 'Hora Compra', 1, 0, 'C', 0);
    $pdf->Cell(85, 10, 'Administrador Comprador (Encargado)', 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode('Método de Pago'), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, 'Monto', 1, 1, 'C', 0);

    $pdf->SetFont('Arial', '', 9);
    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(6);
        $pdf->Cell(20, 10, utf8_decode($row["Id_Factura"]), 1, 0, 'C', 0);
        $pdf->Cell(22, 10, utf8_decode($row["Hora"]), 1, 0, 'C', 0);
        $pdf->Cell(85, 10, utf8_decode($row["Nombre_Administrador"]), 1, 0, 'C', 0);
        $pdf->Cell(30, 10, utf8_decode($row["Metodo_Pago"]), 1, 0, 'C', 0);
        $pdf->Cell(30, 10, utf8_decode('L.' . $row["Total"]), 1, 1, 'C', 0);
        $totalDia = $totalDia + $row["Total"];
    }
    $pdf->Cell(6);
    $pdf->Cell(127, 10, '', 0, 0, 'C', 0);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(30, 10, 'Total', 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode('L.' . number_format($totalDia, 2)), 1, 1, 'C', 0);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
}


$pdf->Cell(6);
$pdf->Cell(187, 10, '', 0, 1, 'C', 0);
$pdf->Cell(127, 10, '', 0, 0, 'C', 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(6);
$pdf->Cell(30, 10, utf8_decode('Compras del Día'), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode('L.' . number_format($totalDia, 2)), 1, 1, 'C', 0);

$pdf->SetFont('Arial', '', 9);
$x = $pdf->GetX();
$y = $pdf->GetY();
$y = $y + 10;
$pdf->SetXY($x + 10, $y);
$pdf->Cell(40, 10, utf8_decode('Reporte de Facturas de Compras del día ' . date('d-m-Y') . '.                                                                                                  Sales App'));

$pdf->Output('reporteCompras' . date('d-m-Y') . '.pdf','i');
