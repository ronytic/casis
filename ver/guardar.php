<?php
include_once("../login/check.php");
if(!empty($_GET)){
	$CodAlumno=$_GET['CodAlumno'];
	$dia=$_GET['Dia'];
	include_once("../class/asistencia.php");
	include_once("../class/alumnos.php");
	$alumnos=new alumnos;
	$asistencia=new asistencia;
	$al=$alumnos->mostrarDatos($CodAlumno);
	switch($dia){
		case "28":{$values=array("CodAlumno"=>$al['CodAlumno'],
						"CodUsuarioLog"=>$_SESSION['CodUsuarioLog'],
						"FechaRegistro"=>"'2012-05-28'",
						"HoraRegistro"=>"'00:00:00'",
						"Activo"=>1
						);}break;
		case "29":{$values=array("CodAlumno"=>$al['CodAlumno'],
						"CodUsuarioLog"=>$_SESSION['CodUsuarioLog'],
						"FechaRegistro"=>"'2012-05-29'",
						"HoraRegistro"=>"'00:00:00'",
						"Activo"=>1
						);}break;	
		case "30":{$values=array("CodAlumno"=>$al['CodAlumno'],
						"CodUsuarioLog"=>$_SESSION['CodUsuarioLog'],
						"FechaRegistro"=>"'2012-05-30'",
						"HoraRegistro"=>"'00:00:00'",
						"Activo"=>1
						);}break;	
		case "31":{$values=array("CodAlumno"=>$al['CodAlumno'],
						"CodUsuarioLog"=>$_SESSION['CodUsuarioLog'],
						"FechaRegistro"=>"'2012-05-31'",
						"HoraRegistro"=>"'00:00:00'",
						"Activo"=>1
						);}break;	
	}
	//print_r($values);
	$asistencia->registrarAsistencia($values);
}
?>
<script language="javascript" type="text/javascript">
	window.close();
</script>