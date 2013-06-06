<?php
include_once("login/check.php");
$Nivel=$_SESSION['Nivel'];
?>
<div class="grid_12">
        <a href="<?php echo $folder;?>" class="corner-all">Registrar Asistencia</a> 
		<?php 
		if($Nivel==1):
			?>
            	<a href="<?php echo $folder;?>asistencia/registraralumno.php" class="corner-all">Registrar Alumno</a> 
            	<a href="<?php echo $folder;?>asistencia/registrados.php" class="corner-all">Ver Asistentes</a> 
				<a href="<?php echo $folder;?>asistencia/estadisticas.php" class="corner-all">Estadisticas Asistentes</a> 
                <a href="<?php echo $folder;?>material/registrados.php" class="corner-all">Ver Materiales</a> 
				<a href="<?php echo $folder;?>material/estadisticas.php" class="corner-all">Estadisticas Materiales</a> 
			<?php
		endif;
		if($Nivel==2):
			?>
            	<a href="<?php echo $folder;?>asistencia/registraralumno.php" class="corner-all">Registrar Alumno</a>
			<?php
		endif;
		if($Nivel==1 || $Nivel==3):
			?>
           		<a href="<?php echo $folder;?>sorteo/" class="corner-all">SORTEO</a>
            	<a href="<?php echo $folder;?>asistencia/permiso.php" class="corner-all">PERMISOS</a>
			<?php
		endif;
		?>
    <?php if($Nivel==1):?>
    <a href="<?php echo $folder;?>certificado/" class="corner-all">Certificados</a>
    <?php endif;?>
    <a href="<?php echo $folder;?>login/logout.php" class="corner-all">Salir</a>
    <br />
        <div class="centrar">
        <span title="Ronald Franz Nina Layme - fb.com/ronaldnina">Todos los Derechos Reservados Para su Autor &copy;Copyright <?php echo date('Y')?></span>
        </div>
    </div>
     <div class="clear"></div>
</div>
</body>
</html>