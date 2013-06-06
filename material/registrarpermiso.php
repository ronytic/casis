<?php
include_once("../login/check.php");
if(!empty($_POST)){
	include_once("../class/asistencia.php");
	include_once("../class/alumnos.php");
	include_once("../class/tmpacciones.php");
	$ru=$_POST['ru'];
	$asistencia=new asistencia;
	$alumnos=new alumnos;
	$tmp_acciones=new tmp_acciones;
	$al=$alumnos->mostrarDatos($ru);
	if(count($al)==0){
		$data=array("Mensaje"=>"El alumno no esta Registrado","Tipo"=>"Empty");
	}else{
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		$asis=$asistencia->verificarRegistrado($al['CodAlumno'],$fecha);
		if($asis['Can']>=1){
			$asi=$asistencia->verEstadoAsistencia($al['CodAlumno'],$fecha);
			if($asi['Activo']==1){
				$asistencia->actualizarAsistencia(array("Activo"=>0),"CodAlumno=".$al['CodAlumno']);
				$Mensaje="<span>Salida Registrada</span><br><span>".$al['Paterno']." ".$al['Materno']." ".$al['Nombres']."</span> RU:<span>".$al['Ru']."</span> Ci:<span>".$al['Ci']."</span> Hora: <span>".$hora."</span>";
				
				$val=array("CodAlumno"=>$al['CodAlumno'],
						"FechaRegistro"=>"'$fecha'",
						"HoraRegistro"=>"'$hora'",
						"Accion"=>"'Salió'"
				);
				$tmp_acciones->registrarAsistencia($val);
				
				$data=array("Mensaje"=>$Mensaje,"Tipo"=>"OkPermiso");	
			}else{
				$asistencia->actualizarAsistencia(array("Activo"=>1),"CodAlumno=".$al['CodAlumno']);
				$Mensaje="<span>Retorno Registrada</span><br><span>".$al['Paterno']." ".$al['Materno']." ".$al['Nombres']."</span> RU:<span>".$al['Ru']."</span> Ci:<span>".$al['Ci']."</span> Hora: <span>".$hora."</span>";
				$data=array("Mensaje"=>$Mensaje,"Tipo"=>"RetornoPermiso");
				
				$val=array("CodAlumno"=>$al['CodAlumno'],
						"FechaRegistro"=>"'$fecha'",
						"HoraRegistro"=>"'$hora'",
						"Accion"=>"'Retorno'"
				);
				$tmp_acciones->registrarAsistencia($val);
				
			}
		}
	}
		echo json_encode($data);
}
?>