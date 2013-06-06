<?php
include_once("../login/check.php");
if(!empty($_POST)):
	include_once("../class/alumnos.php");
	include_once("../class/asistencia.php");
	$alumnos=new alumnos;
	$asistencia=new asistencia;
	$ci=$_POST['ci'];
	if($ci=="00000000"){
		?>
        <h2>No Hay Asistentes para el Sorteo</h2>
        <?php	
	}else{
		$al=$alumnos->mostrarDatosXCi($ci);
		$asistencia->actualizarAsistencia(array("Sorteado"=>"1","FechaSorteo"=>"'".date("Y-m-d")."'","HoraSorteo"=>"'".date("H:i:s")."'"),"CodAlumno=".$al['CodAlumno']);
		?>
		<?php if(file_exists("../images/alumnos/".$al['Ru'].".jpg")){?>
			<img src="../images/alumnos/<?php echo $al['Ru'].".jpg";?>" class="corner-all"/>
		<?php }else{
		?>
			<img src="../images/0.jpg" class="corner-all"/>
		<?php	
		}?><br />
		<h2><?php echo mb_strtoupper($al['Paterno']." ".$al['Materno']." ".$al['Nombres'],"utf8");?></h2>
		<?php
	}
endif;
?>