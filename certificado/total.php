<?php
include_once("../login/check.php");
include_once("../fpdf/fpdf.php");
class PDF extends FPDF{
		function Header(){
		//$this->Image("../images/certificado.jpg",0,0,215,280);	
			
		}
		function Footer()
		{	
		}
	}
	include_once("../class/asistencia.php");
	include_once("../class/alumnos.php");
	$pdf=new PDF("P","mm","letter");//612,792
	$pdf->SetMargins(0,0,0);
	$pdf->SetAutoPageBreak(true,0);
	$alumnos=new alumnos;
	$asistencia=new asistencia;
	$pdf->SetFont("Helvetica","",26);
	
	

	foreach($alumnos->mostrarAsistentes() as $al){
		if(strlen($al['Paterno']." ".$al['Materno']." ".$al['Nombres'])>35)
			$pdf->SetFont("Helvetica","",24);
		else
			$pdf->SetFont("Helvetica","",26);
		
		$fecha1=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2013-06-10");
		$fecha2=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2013-06-11");
		$fecha3=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2013-06-12");
		$fecha4=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2013-06-13");
		$total=$fecha1['Cantidad']+$fecha2['Cantidad']+$fecha3['Cantidad']+$fecha4['Cantidad'];

	if($total>=3)
	{
		$pdf->AddPage();
	$pdf->SetXY(25,64);
	
	//$al=array("Paterno"=>"Nina","Materno"=>"Layme","Nombres"=>"Ronald Franz");
	$pdf->Cell(180,12,utf8_decode(ucwords(mb_strtolower($al['Paterno']." ".$al['Materno']." ".$al['Nombres'],"utf8"))),0,0,"C",$relleno);

	}
		

	}
	$pdf->Output();
?>