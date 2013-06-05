<?php
include_once("../login/check.php");
$folder="../";
if(!empty($_POST)){
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];	
	$nombres=$_POST['nombres'];
	$ci=$_POST['ci'];
	$ru=$_POST['ru'];
	include_once("../class/alumnos.php");
	$alumnos=new alumnos;
	include_once("../cabecerahtml.php");
	include_once("../cabecera.php");
	?>
    <div class="prefix_4 grid_4 suffix_4">
	<?php
	if(count($alumnos->mostrarDatosRu($ru))<1){
		$values=array("Nombres"=>"'$nombres'",
					"Paterno"=>"'$paterno'",
					"Materno"=>"'$materno'",
					"Ru"=>"'$ru'",
					"Ci"=>"'$ci'",
					"Valido"=>1
					);
		$alumnos->registrarAlumno($values);
		?>
        <div class="verdeC corner-all">Usuario Registrado Correctamente.
        <table class="tabla">
        	<tr class="contenido"><td>R.U.</td><td><?php echo $ru;?></td></tr>
            <tr class="contenido"><td>Paterno</td><td><?php echo $paterno;?></td></tr>
            <tr class="contenido"><td>Materno</td><td><?php echo $materno;?></td></tr>
            <tr class="contenido"><td>Nombres</td><td><?php echo $nombres;?></td></tr>
            <tr class="contenido"><td>C.I.</td><td><?php echo $ci;?></td></tr>
        </table>
        </div>
        <?php
	}else{
		?>
        <div class="naranjaC corner-all">Usuario ya registrado.
        </div>
        <?php
	}
	?>
    </div>
    <?php
	include_once("../pie.php");
}
?>