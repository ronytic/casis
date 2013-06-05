<?php
include_once("../login/check.php");
if(!empty($_POST)){
	$Fecha=str_replace("/","-",$_POST['fecha']);
	$Fecha=date("Y-m-d",strtotime($Fecha));
	include_once("../class/asistencia.php");
	include_once("../class/alumnos.php");
	$asistencia=new asistencia;
	$alumnos=new alumnos;
	?>
	Alumnos que ingresaron al Evento en la fecha: <?php echo date("d-m-Y",strtotime($Fecha));?>
    	<table class="tabla">
        	<tr class="cabecera"><td>Nº</td><td>Paterno</td><td>Materno</td><td>Nombres</td><td>Hora de Registro</td></tr>
        
		<?php
			
			$asis=$asistencia->mostrarAsistentesXFecha($Fecha);
			$i=0;
			foreach($asis as $as){
				$i++;
				$al=$alumnos->mostrarDatosXCod($as['CodAlumno']);
				?>
                <tr class="contenido"><td><?php echo $i;?></td><td><?php echo $al['Paterno']?></td><td><?php echo $al['Materno']?></td><td><?php echo $al['Nombres']?></td><td><?php echo $as['HoraRegistro']?></td></tr>
                <?php	
			}
		?></table>
   <?php
}
?>

	
