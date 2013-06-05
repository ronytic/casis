<?php
include_once("login/check.php");
$Nivel=$_SESSION['Nivel'];
?>
<div class="grid_12">
        <a href="<?php echo $folder;?>" class="corner-all">Registrar Asistencia</a> |
		<?php 
		if($Nivel==1):
			?>
            	<a href="<?php echo $folder;?>asistencia/registraralumno.php" class="corner-all">Registrar Alumno</a> |
            	<a href="<?php echo $folder;?>asistencia/registrados.php" class="corner-all">Ver Registrados</a> |
				<a href="<?php echo $folder;?>asistencia/estadisticas.php" class="corner-all">Ver Estadisticas</a> |
                <a href="<?php echo $folder;?>asistencia/certificados.php" class="corner-all">Certificados</a>  |
			<?php
		endif;
		if($Nivel==2):
			?>
            	<a href="<?php echo $folder;?>asistencia/registraralumno.php" class="corner-all">Registrar Alumno</a>
			<?php
		endif;
		if($_SESSION['CodUsuarioLog']==1):
			?>
            	<a href="<?php echo $folder;?>asistencia/permiso.php" class="corner-all">PERMISO</a>
			<?php
		endif;
		?>
    <a href="<?php echo $folder;?>login/logout.php" class="corner-all">Salir</a>
    <span>&copy;Copyright <?php echo date('Y')?></span>
    
    </div>
     <div class="clear"></div>
</div>
</body>
</html>