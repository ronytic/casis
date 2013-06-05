<?php
include_once("../login/check.php");
if(!empty($_POST)){
	$ru=$_POST['Ru'];
	include_once("../class/asistencia.php");
	include_once("../class/alumnos.php");
	$alumnos=new alumnos;
	$asistencia=new asistencia;
	$al=$alumnos->mostrarDatos($ru);
	$fecha1=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2012-05-28");
	$fecha2=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2012-05-29");
	$fecha3=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2012-05-30");
	$fecha4=$asistencia->verAsistenciaFecha($al['CodAlumno'],"2012-05-31");
	$total=$fecha1['Cantidad']+$fecha2['Cantidad']+$fecha3['Cantidad']+$fecha4['Cantidad'];
	?>
    <table class="tabla">
    	<tr class="cabecera"><td>Paterno</td><td>Materno</td><td>Nombres</td><td>28 mayo</td><td>29 mayo</td><td>30 mayo</td><td>31 mayo</td><td>T</td></tr>
    	<tr>
        	<td><?php echo $al['Paterno']?></td>
            <td><?php echo $al['Materno']?></td>
            <td><?php echo $al['Nombres']?></td>
        	<td><?php echo $fecha1['Cantidad']>=1?'si':'no <a href="guardar.php?CodAlumno='.$al[Ru].'&Dia=28" target="_blank">.</a>';?></td>
            <td><?php echo $fecha2['Cantidad']>=1?'si':'no <a href="guardar.php?CodAlumno='.$al[Ru].'&Dia=29" target="_blank">.</a>';?></td>
            <td><?php echo $fecha3['Cantidad']>=1?'si':'no <a href="guardar.php?CodAlumno='.$al[Ru].'&Dia=30" target="_blank">.</a>';?></td>
            <td><?php echo $fecha4['Cantidad']>=1?'si':'no <a href="guardar.php?CodAlumno='.$al[Ru].'&Dia=31" target="_blank">.</a>';?></td>
            <td><?php echo $total;?></td>
        </tr>
    </table>
    <?php
	
}
?>