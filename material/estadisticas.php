<?php
include_once("../login/check.php");
include_once("../config.php");
include_once("../class/material.php");
$material=new material;
$folder="../";
include_once("../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<?php
include_once("../cabecera.php");
?>
	<div class="prefix_2 grid_8 suffix_2">
    	<h2>Estadisticas de Entrega de Materiales</h2>
    	Cantidad Total de Alumnos que entregaron materiales.
    	<table class="tabla">
        	<tr class="cabecera"><td>Fecha</td><td>Cantidad</td></tr>
        
		<?php
			$asis=$material->mostrarMaterialXDias();
			
			if(count($asis,COUNT_RECURSIVE)==2){
				?>
					<tr class="contenido"><td><?php echo utf8_encode(strftime("%A, %d de %B del %Y",strtotime($asis['FechaRegistro'])));?></td><td class="der"><?php echo $asis['Cantidad'];?></td></tr>
				<?php
			}else{
				foreach($asis as $as){
					?>
					<tr class="contenido"><td><?php echo utf8_encode(strftime("%A, %d de %B del %Y",strtotime($as['FechaRegistro'])));?></td><td class="der"><?php echo $as['Cantidad'];?></td></tr>
				<?php
				}
			}
		?></table>
    </div>
    <div class="clear"></div>
<?php include_once("../pie.php");?>
