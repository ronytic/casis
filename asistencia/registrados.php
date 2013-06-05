<?php
include_once("../login/check.php");
include_once("../config.php");
include_once("../class/asistencia.php");
$asistencia=new asistencia;
$folder="../";
include_once("../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../js/registrados.js"></script>
<?php
include_once("../cabecera.php");
?>
	<div class="prefix_2 grid_8 suffix_2">
    Fecha:<input type="date" name="fecha" value="<?php echo date("d/m/Y");?>" id="fecha"/><input type="submit" value="Revisar" class="mediano" id="revisar">
    <div id="respuesta">
    
    </div>
    </div>
    <div class="clear"></div>
<?php include_once("../pie.php");?>
