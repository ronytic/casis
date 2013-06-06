<?php
include_once("login/check.php");
if(!empty($_POST)){
	include_once("class/asistencia.php");
	include_once("class/alumnos.php");
	include_once("class/material.php");
	include_once("class/tmpacciones.php");
	$ru=$_POST['ru'];	
	$alumno=new alumnos;
	$asistencia=new asistencia;
	$material=new material;
	$tmp_acciones=new tmp_acciones;
	$al=$alumno->mostrarDatos($ru);
	if(count($al)==0){
			$data=array("Mensaje"=>"El alumno no esta Registrado","Tipo"=>"Empty");
	}else{
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		$asis=$asistencia->verificarRegistrado($al['CodAlumno'],$fecha);
		$mat=$material->verificarRegistrado($al['CodAlumno']);
		$mat=array_shift($mat);
		if($asis['Can']>=1){
			$Mensaje="Alumno ya marco Asistencia. <br><span>".$al['Paterno']." ".$al['Materno']." ".$al['Nombres']."</span><br> RU:<span>".$al['Ru']."</span> Ci:<span>".$al['Ci']."</span> Hora: <span>".$hora."</span>";
			$data=array("Mensaje"=>$Mensaje,"Tipo"=>"Repeat");
		}else{
			$values=array("CodAlumno"=>$al['CodAlumno'],
						"CodUsuarioLog"=>$_SESSION['CodUsuarioLog'],
						"FechaRegistro"=>"'$fecha'",
						"HoraRegistro"=>"'$hora'",
						"Activo"=>1
						);
			$val=array("CodAlumno"=>$al['CodAlumno'],
						"FechaRegistro"=>"'$fecha'",
						"HoraRegistro"=>"'$hora'",
						"Accion"=>"'Ingreso'"
			);
			
			$asistencia->registrarAsistencia($values);
			$tmp_acciones->registrarAsistencia($val);
			//$material->registrarMaterial($values);
			if($mat['Can']==0){
				$material->registrarMaterial($values);
			}
			$Mensaje="<div class='linea'>Registrado Correctamente. <br><span>".$al['Paterno']." ".$al['Materno']." ".$al['Nombres']."</span> <br>RU:<span>".$al['Ru']."</span> Ci:<span>".$al['Ci']."</span> Hora: <span>".$hora."</span></div><div class='linea material'><img src='images/".($mat['Can']?'material':'nomaterial').".png' width=50><br><span>".($mat['Can']?'Cuenta con Material':'Sin material')."</span></div>";
			
			$data=array("Mensaje"=>$Mensaje,"Tipo"=>"Ok");
		}
			
	}
	echo json_encode($data);
}
?>