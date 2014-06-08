<?php
include_once("login/check.php");
include_once("class/alumnos.php");
include_once("class/alumnos2.php");
$alumnos=new alumnos;
$alumnos2=new alumnos2;
foreach($alumnos2->mostrarTodos() as $al2){
	$valores=array(
		"Paterno"=>"'".$al2['Paterno']."'",
		"Materno"=>"'".$al2['Materno']."'",
		"Nombres"=>"'".$al2['Nombres']."'"
	
	);
	$alumnos->actualizarAlumno($valores,"CodAlumno=".$al2['CodAlumno']);
}
?>