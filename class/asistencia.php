<?php
include_once("db2.php");
class asistencia extends db{
	var $tabla="asistencia";
	function mostrarAsistenciaXDias(){
		$this->campos=array("count(*) as Cantidad,FechaRegistro");
		return $this->getRecords("Activo=1",0,"FechaRegistro");
	}
	function verificarRegistrado($CodAlumno,$Fecha){
		$this->campos=array("count(*) as Can");	
		return $this->getRecords("CodAlumno='$CodAlumno' and FechaRegistro='$Fecha'");
	}
	function verEstadoAsistencia($CodAlumno,$Fecha){
		$this->campos=array("*");	
		return $this->getRecords("CodAlumno='$CodAlumno' and FechaRegistro='$Fecha'");
	}
	function registrarAsistencia($values){
		$this->insertRow($values,1);	
	}
	function mostrarAsistentesXFecha($Fecha){
		$this->campos=array("*");
		return $this->getRecords("FechaRegistro='$Fecha' and Activo=1 and HoraRegistro>='8:00:00'","FechaRegistro,HoraRegistro",0,0,0,0,1);
	}
	function mostrarPermisosXFecha($Fecha){
		$this->campos=array("*");
		return $this->getRecords("FechaRegistro='$Fecha' and Activo=0",0,0,0,0,0,1);
	}
	function verAsistentesVivo($Fecha,$Limite,$Valido){
		$this->campos=array("*");	
		return $this->getRecords("FechaRegistro='$Fecha' and Activo=$Valido and HoraRegistro>='8:00:00'","CodAsistencia",0,$Limite,0,1,1);
	}
	function verAsistenciaFecha($CodAlumno,$Fecha){
		$this->campos=array("count(*) as Cantidad");	
		return $this->getRecords("FechaRegistro='$Fecha' and CodAlumno=$CodAlumno and Activo=1");
	}
	function actualizarAsistencia($values,$where){
		$this->updateRow($values,$where);
	}
	function cantidadAsistenciasTotal($CodAlumno){
		$this->campos=array("count(*) as cantidad");
		return $this->getRecords("CodAlumno=$CodAlumno and Activo=1");	
	}
	function mostrarAsistenciasTotal($CodAlumno){
		$this->campos=array("*");
		return $this->getRecords("CodAlumno=$CodAlumno and Activo=1");	
	}
}
?>