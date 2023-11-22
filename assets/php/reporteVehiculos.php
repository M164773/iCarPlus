<?php
    include_once('conexion.php');

    require('fpdf/fpdf.php');
    $query = "SELECT * FROM icar_vehiculos";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $pdf = new FPDF(); 
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, 'Tabla de Registros', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',12);
    $width_cell=array(14,50,14,18,20,23,12,20,20);
    $pdf->SetFillColor(193,229,252);

    $pdf->Cell($width_cell[0],10,'MATR',1,0,'C',true);
    $pdf->Cell($width_cell[1],10,'DESCR',1,0,'C',true);
    $pdf->Cell($width_cell[2],10,'IMG',1,0,'C',true);
    $pdf->Cell($width_cell[3],10,'MARCA',1,0,'C',true);
    $pdf->Cell($width_cell[4],10,'MODELO',1,0,'C',true);
    $pdf->Cell($width_cell[5],10,'TIPO',1,0,'C',true);
    $pdf->Cell($width_cell[6],10,utf8_decode('AÑO'),1,0,'C',true);
    $pdf->Cell($width_cell[7],10,'CLASIF',1,0,'C',true);
    $pdf->Cell($width_cell[8],10,'CEDULA',1,0,'C',true);

    $pdf->SetFont('Arial','',8);
    $pdf->SetFillColor(235,236,236); 
    $fill=false;

    while($row=mysqli_fetch_array($rs)) {
        $pdf->Ln();
        $pdf->Cell($width_cell[0],10,$row[0],1,0,'C',$fill);
        $pdf->Cell($width_cell[1],10,utf8_decode($row[1]),1,0,'C',$fill);
        $pdf->Cell($width_cell[2],10,$pdf->Image(trim($row[2], 'assets/php/'), $pdf->GetX(), $pdf->GetY(), 14),1,0,'C',$fill);
        $pdf->Cell($width_cell[3],10,$row[3],1,0,'C',$fill);
        $pdf->Cell($width_cell[4],10,$row[4],1,0,'C',$fill);
        $pdf->Cell($width_cell[5],10,utf8_decode($row[5]),1,0,'C',$fill);
        $pdf->Cell($width_cell[6],10,$row[6],1,0,'C',$fill);
        $pdf->Cell($width_cell[7],10,$row[7],1,0,'C',$fill);
        $pdf->Cell($width_cell[8],10,$row[8],1,0,'C',$fill);
        $fill = !$fill;
    }

    $pdf->Output("I", "vehiculos.pdf");
?>