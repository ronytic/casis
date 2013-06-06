<?php
include_once("db2.php");
class alumnos extends db{
	var $tabla="alumnos";
	function mostrarTodos(){
		$this->campos=array("*");
		return $this->getRecords("","Paterno,Materno,Nombres");
	}
	function mostrarAsistentes(){
		$this->campos=array("*");
		return $this->getRecords("CodAlumno IN (Select Distinct(CodAlumno) from asistencia WHERE Activo=1)","Paterno,Materno,Nombres");
			
	}
	function mostrarDatos($Ru){
		$this->campos=array("*");
		return $this->getRecords("Ru=$Ru or Ci=$Ru");
	}
	function mostrarDatosRu($Ru){
		$this->campos=array("*");
		return $this->getRecords("Ru=$Ru",0,0,0,0,0,1);
	}
	function mostrarDatosXCod($CodAlumno){
		$this->campos=array("*");
		return $this->getRecords("CodAlumno=$CodAlumno");
	}
	function mostrarDatosXCi($Ci){
		$this->campos=array("*");
		return $this->getRecords("Ci='$Ci'");
	}
	
	function registrarAlumno($values){
		$this->insertRow($values,1);	
	}
}
?>