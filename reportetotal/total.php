<?php
include_once("../login/check.php");
include_once("../fpdf/fpdf.php");
class PDF extends FPDF{
		function Header(){
			$fecha=date("d-m-Y");
			$this->AliasNbPages();
			$this->Image("../images/logo.png",10,10,20,20);
			$this->Image("../images/lema.png",30,10,150,20);
			$this->SetFont("Arial","",10);
			$this->SetXY(34,12);
			//$this->Cell(55,4,utf8_decode("Soluciones Tecnológicas"));
			$this->SetFont("Arial","",8);
			$this->SetXY(34,16);
			//$this->Cell(40,4,utf8_decode("& Asociados"),0,0,"C");
			$this->ln(15);
			
			$this->SetFont("Arial","B",18);
			$this->Cell(190,4,"REPORTE TOTAL DE ASISTENCIA - CASIS 2012",0,5,"C");
			$this->ln(5);
			$this->SetFont("Arial","B",10);
			$this->Cell(25,4,"Fecha Actual: ",0,0,"L");
			$this->SetFont("Arial","",10);
			$this->Cell(20,4,$fecha,0,0,"L");
			
			
			$this->SetFont("Arial","B",10);
			$this->Cell(8,4,utf8_decode("Pág:"),0,0,"L");
			$this->SetFont("Arial","",10);
			$this->Cell(176,5,$this->PageNo()." de {nb}",0,1);
			$this->ln(0);
			$this->Cell(176,0,"",1,1);
			$this->SetFont("Arial","B",10);
			$this->Cell(5,4,utf8_decode("Nº"),1,0,"C");
			$this->Cell(10,4,"RU",1,0,"C");
			$this->Cell(24,4,"Paterno",1,0,"C");
			$this->Cell(24,4,"Materno",1,0,"C");
			$this->Cell(35,4,"Nombres",1,0,"C");
			$this->SetFont("Arial","B",9);
			
			$this->SetFont("Arial","B",10);
			$this->Cell(15,4,"28 may",1,0,"C");
			$this->Cell(15,4,"29 may",1,0,"C");
			$this->Cell(15,4,"30 may",1,0,"C");
			$this->Cell(15,4,"31 may",1,0,"C");
			$this->Cell(15,4,"Total",1,0,"C");
			$this->ln();
			$this->Cell(176,0,"",1,1);
			
		}
		function Footer()
		{	global $lema;
			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Número de página
			$this->Cell(176,0,"",1,1);
			$anio=date("Y");
			$this->Cell(176,4,utf8_decode("Todos los derechos reservados para Soluciones Tecnologicas & Asociados © CopyRight 2012 | Cel:73230568"),0,1,"C");
		}
	}
	include_once("../class/asistencia.php");
	include_once("../class/alumnos.php");
	$pdf=new PDF("P","mm","letter");//612,792
	$pdf->SetAutoPageBreak(true,15);
	$alumnos=new alumnos;
	$asistencia=new asistencia;
	$pdf->AddPage();
	$pdf->SetFont("Arial","",9);
	$pdf->SetFillColor(234,234,234);
	$i=0;
	foreach($alumnos->mostrarAsistentes() as $al){
		$i++;
		if($i%2==0){
			$relleno=1;	
		}else{
			$relleno=0;
		}
		$pdf->Cell(5,4,utf8_decode(mb_strtoupper($i,"utf8")),1,0,"C",$relleno);
		$pdf->Cell(10,4,utf8_decode(mb_strtoupper($al['Ru'],"utf8")),1,0,"C");
		$pdf->Cell(24,4,utf8_decode(ucwords(mb_strtolower($al['Paterno'],"utf8"))),1,0,"L",$relleno);
		$pdf->Cell(24,4,utf8_decode(ucwords(mb_strtolower($al['Materno'],"utf8"))),1,0,"L",$relleno);
		$pdf->Cell(35,4,utf8_decode(ucwords(mb_strtolower($al['Nombres'],"utf8"))),1,0,"L",$relleno);
		$fecha1=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2012-05-28");
		$fecha2=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2012-05-29");
		$fecha3=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2012-05-30");
		$fecha4=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2012-05-31");
		$total=$fecha1['Cantidad']+$fecha2['Cantidad']+$fecha3['Cantidad']+$fecha4['Cantidad'];

		if($fecha1['Cantidad']>=1){ $t1="X"; }else{ $t1="";	}
		if($fecha2['Cantidad']>=1){ $t2="X"; }else{ $t2="";	}
		if($fecha3['Cantidad']>=1){ $t3="X"; }else{ $t3="";	}
		if($fecha4['Cantidad']>=1){ $t4="X"; }else{ $t4="";	}
		
		$pdf->Cell(15,4,$t1,1,0,"C",$relleno);
		$pdf->Cell(15,4,$t2,1,0,"C",$relleno);
		$pdf->Cell(15,4,$t3,1,0,"C",$relleno);
		$pdf->Cell(15,4,$t4,1,0,"C",$relleno);
		$pdf->Cell(15,4,$total,1,0,"C",$relleno);
		$pdf->ln(4);
	}
	$pdf->Output();
?>