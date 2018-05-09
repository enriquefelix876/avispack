<?php
	include 'usuarios.php';
	require '../php/conexion.php';
	
	$query = "select * from user";
	$resultado = $con->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10,6,'ID',1,0,'C',1);
    $pdf->Cell(50,6,'Usuario',1,0,'C',1);
    $pdf->Cell(50,6,'Email',1,0,'C',1);
	$pdf->Cell(30,6,'Rol',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha Registro',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(10,6,utf8_decode($row['id']),1,0,'C');
        $pdf->Cell(50,6,utf8_decode($row['username']),1,0,'C');
        $pdf->Cell(50,6,utf8_decode($row['email']),1,0,'C');
		$pdf->Cell(30,6,$row['rol'],1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['created_at']),1,1,'C');
	}
	$pdf->Output();
?>