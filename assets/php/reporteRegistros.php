<?php
    include_once('conexion.php');

    require('fpdf/fpdf.php');
    $query = "SELECT * FROM icar_registro";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $pdf = new FPDF(); 
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, 'Tabla de Registros', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',16);
    $width_cell=array(20,35,55,40,40);
    $pdf->SetFillColor(193,229,252);

    $pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
    $pdf->Cell($width_cell[1],10,utf8_decode('VEHÍCULO'),1,0,'C',true);
    $pdf->Cell($width_cell[2],10,'REPUESTOS',1,0,'C',true);
    $pdf->Cell($width_cell[3],10,'ESTADO',1,0,'C',true);
    $pdf->Cell($width_cell[4],10,utf8_decode('MECÁNICO'),1,0,'C',true);

    $pdf->SetFont('Arial','',12);
    $pdf->SetFillColor(235,236,236); 
    $fill=false;

    while($row=mysqli_fetch_array($rs)) {
        $pdf->Ln();
        $pdf->Cell($width_cell[0],10,$row[0],1,0,'C',$fill);
        $pdf->Cell($width_cell[1],10,utf8_decode($row[1]),1,0,'C',$fill);
        $pdf->Cell($width_cell[2],10,utf8_decode($row[2]),1,0,'C',$fill);
        $pdf->Cell($width_cell[3],10,$row[3],1,0,'C',$fill);
        $pdf->Cell($width_cell[4],10,utf8_decode($row[4]),1,0,'C',$fill);
        $fill = !$fill;
    }

    $pdf->Output("I", "registros.pdf");
?>