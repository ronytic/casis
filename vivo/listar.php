<?php
include_once("../login/check.php");
include_once("../class/asistencia.php");
include_once("../class/alumnos.php");
include_once("../class/tmpacciones.php");
$folder="../";
$titulo="ÚLTIMOS INGRESOS";
$asistencia=new asistencia;
$alumnos=new alumnos;
$tmp_acciones=new tmp_acciones;
$Fecha=date("Y-m-d");
?>
    		<ul class="alumnos">
		<?php
			$asist=$asistencia->verAsistentesVivo($Fecha,5,1);
			
				foreach($asist as $asis){
					$al=$alumnos->mostrarDatosXCod($asis['CodAlumno']);
					?>
					<li class="corner-all blanco <?php
                            	/*switch($asis['Accion']){
									case 'Salió':echo "rojoC";break;
									case 'Ingreso':echo "verdeC";break;
									case 'Retorno':echo "naranjaC";break;
								}*/
							?>">
						<?php if(file_exists("../images/alumnos/".$al['Ru'].".jpg")){?>
							<img src="../images/alumnos/<?php echo $al['Ru'].".jpg";?>" class="corner-all"/>
						<?php }else{
						?>
							<img src="../images/0.jpg" class="corner-all"/>
						<?php	
						}?>
						<div class="datos">
							<h2>
							<?php
								echo utf8_encode(mb_strtoupper(utf8_decode($al['Paterno']." ".$al['Materno']." ".$al['Nombres']),"utf8"));
							?>
							</h2>
							<span>R.U.: <?php
								echo $al['Ru'];
							?></span><br />
							<span class="asistencias corner-all">Asistencias: 
							<?php $a=$asistencia->cantidadAsistenciasTotal($al['CodAlumno']);
							echo $a['cantidad'];?> Días
							</span>
                            <span class="corner-all msg ">
                            	<?php echo $asis['Accion'];?>
                            </span>
						</div>
					</li>
					<?php
				
			}
		?>
        </ul>

