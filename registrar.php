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
		$a=$asistencia->cantidadAsistenciasTotal($al['CodAlumno']);
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		$asis=$asistencia->verificarRegistrado($al['CodAlumno'],$fecha);
		$mat=$material->verificarRegistrado($al['CodAlumno']);
		$mat=array_shift($mat);
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
		$totalasistencias=$asistencia->mostrarAsistenciasTotal($al['CodAlumno']);
		//print_r($totalasistencias);
		$datosasistencias="<table class='borde'>";
		foreach($totalasistencias as $ta){
			$datosasistencias.='<tr><td><span><small>'.ucwords(utf8_encode(strftime("%A",strtotime( $ta['FechaRegistro'])))).'</small></span></td><td><span><small>'.$ta['HoraRegistro'].'</small></span></td></tr>';
			
		}
		$datosasistencias.="</table>";
		//$asistencia->registrarAsistencia($values);
		//$tmp_acciones->registrarAsistencia($val);
		$CantidadHoy=$asis['Can'];
		$CantidadTotal=$a['cantidad'];
		//echo $datosasistencias;
		if($asis['Can']>=1){
			$Mensaje2="<div class='linea'>
				<table>
					<tr><td colspan='1'>Usted ya marco su Asistencia.</td><td rowspan='4' ><img src='images/alumnos/".$al['Ru'].".jpg' width='100' class='foto'/></td><td rowspan='4'>".$datosasistencias."</td></tr>
					<tr><td><span>".$al['Paterno']." ".$al['Materno']." ".$al['Nombres']."</span></td></tr>
					<tr><td>RU:<span>".$al['Ru']."</span> Ci:<span>".$al['Ci']."</span></td></tr>
					<tr><td>Hora: <span>".$hora."</span> </td></tr>
					<tr><td>Cantidad Hoy: <span>".$CantidadHoy."</span> Cantidad Total: <span>".$CantidadTotal."</span></td></tr>
				</table>
				"."</div><div class='linea material'><img src='images/".($mat['Can']?'material':'nomaterial').".png' width=50><br><span>".($mat['Can']?'Cuenta con Material':'Sin material')."</span></div>";
			//echo $Mensaje2;
			
			$data=array("Mensaje"=>$Mensaje2,"Tipo"=>"Repeat");
		}else{
			
			//$material->registrarMaterial($values);
			if($mat['Can']==0){
				$material->registrarMaterial($values);
			}
			$Mensaje="<div class='linea'>
				<table>
					<tr><td colspan='1'>Registrado Correctamente.</td><td rowspan='4' ><img src='images/alumnos/".$al['Ru'].".jpg' width='100' class='foto'/></td><td rowspan='4'>".$datosasistencias."</td></tr>
					<tr><td><span>".$al['Paterno']." ".$al['Materno']." ".$al['Nombres']."</span></td></tr>
					<tr><td>RU:<span>".$al['Ru']."</span> Ci:<span>".$al['Ci']."</span></td></tr>
					<tr><td>Hora: <span>".$hora."</span> </td></tr>
					<tr><td>Cantidad Hoy: <span>".$CantidadHoy."</span> Cantidad Total: <span>".$CantidadTotal."</span></td></tr>
				</table>
				"."</div><div class='linea material'><img src='images/".($mat['Can']?'material':'nomaterial').".png' width=50><br><span>".($mat['Can']?'Cuenta con Material':'Sin material')."</span></div>";
			
			$data=array("Mensaje"=>$Mensaje,"Tipo"=>"Ok");
		}
			
	}
	echo json_encode($data);
}
?>