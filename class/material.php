<?php
include_once("db2.php");
class material extends db{
	var $tabla="material";
	function mostrarMaterialXDias(){
		$this->campos=array("count(*) as Cantidad,FechaRegistro");
		return $this->getRecords("Activo=1",0,"FechaRegistro");
	}
	function verificarRegistrado($CodAlumno){
		$this->campos=array("count(*) as Can");	
		return $this->getRecords("CodAlumno='$CodAlumno'");
	}
	function verEstadoMaterial($CodAlumno,$Fecha){
		$this->campos=array("*");	
		return $this->getRecords("CodAlumno='$CodAlumno' and FechaRegistro='$Fecha'");
	}
	function registrarMaterial($values){
		$this->insertRow($values,1);	
	}
	function mostrarMaterialXFecha($Fecha){
		$this->campos=array("*");
		return $this->getRecords("FechaRegistro='$Fecha' and Activo=1",0,0,0,0,0,1);
	}
	function mostrarPermisosXFecha($Fecha){
		$this->campos=array("*");
		return $this->getRecords("FechaRegistro='$Fecha' and Activo=0",0,0,0,0,0,1);
	}
	function verAsistentesVivo($Fecha,$Limite,$Valido){
		$this->campos=array("*");	
		return $this->getRecords("FechaRegistro='$Fecha' and Activo=$Valido","CodAsistencia",0,$Limite,0,1,1);
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
}
?>