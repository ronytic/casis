<?php
include_once("../login/check.php");
if(!empty($_POST)){
	$Fecha=str_replace("/","-",$_POST['fecha']);
	$Fecha=date("Y-m-d",strtotime($Fecha));
	include_once("../class/asistencia.php");
	include_once("../class/alumnos.php");
	$asistencia=new asistencia;
	$alumnos=new alumnos;
	$asis=$asistencia->mostrarAsistentesXFecha($Fecha);
	if(count($asis)){
	?>
		Alumnos que ingresaron al Evento en la fecha: <?php echo date("d-m-Y",strtotime($Fecha));?>
    	<table class="tabla">
        	<tr class="cabecera"><td>Nº</td><td>Paterno</td><td>Materno</td><td>Nombres</td><td>Ru</td><td>Carnet</td><td>Hora de Registro</td></tr>
        
		<?php
			
			
			$i=0;
			foreach($asis as $as){
				$i++;
				$al=$alumnos->mostrarDatosXCod($as['CodAlumno']);
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                    <td><?php echo ucwords(mb_strtolower($al['Paterno'],"utf8"))?></td>
                    <td><?php echo ucwords(mb_strtolower($al['Materno'],"utf8"))?></td>
                    <td><?php echo ucwords(mb_strtolower($al['Nombres'],"utf8"))?></td>
                    <td><?php echo ucwords(mb_strtolower($al['Ru'],"utf8"))?></td>
                    <td><?php echo ucwords(mb_strtolower($al['Ci'],"utf8"))?></td>
                    <td><?php echo $as['HoraRegistro']?></td></tr>
                <?php	
			}
		?></table>
   <?php
	}else{
		?>
        <h2>No existe Asistentes en la fecha: <?php echo date("d-m-Y",strtotime($Fecha));?></h2>
        <?php	
	}
}
?>

	
