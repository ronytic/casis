<?php
include_once("db2.php");
class tmp_acciones extends db{
	var $tabla="tmp_acciones";
	
	function registrarAsistencia($values){
		$this->insertRow($values,1);	
	}
	
	function verAsistentesVivo($Fecha,$Limite,$Valido){
		$this->campos=array("*");	
		return $this->getRecords("FechaRegistro='$Fecha'","CodTmp_Acciones",0,$Limite,0,1,1);
	}
	
	
}
?>