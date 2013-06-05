<?php
include_once("../login/check.php");
include_once("../class/asistencia.php");
$asistencia=new asistencia;
$Fecha=date("Y-m-d");
$asisFecha=$asistencia->mostrarAsistentesXFecha($Fecha);
$asisPermisos=$asistencia->mostrarPermisosXFecha($Fecha);
$total=count($asisFecha);
$permisos=count($asisPermisos);
$valores=array("permisos"=>$permisos,"total"=>$total);
echo json_encode($valores);
?>