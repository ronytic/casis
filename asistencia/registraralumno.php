<?php
$folder="../";
$titulo="Registrar Alumno";
include_once("../cabecerahtml.php");
include_once("../cabecera.php");
?>
<div class="prefix_4 grid_4 suffix_4">
	<div class="resaltarcuerpo corner-all">
    	<form autocomplete="off" action="guardar.php" method="post">
    	<table>
        	<tr><td>Nombres</td><td><input type="text" name="nombres" class="texto" autofocus></td></tr>
            <tr><td>Paterno</td><td><input type="text" name="paterno" class="texto"></td></tr>
            <tr><td>Materno</td><td><input type="text" name="materno" class="texto"></td></tr>
            <tr><td>R.U.</td><td><input type="text" name="ru" class="texto"></td></tr>
            <tr><td>C.I.</td><td><input type="text" name="ci" class="texto"></td></tr>
            <tr><td>Género</td><td><select name="genero" class="texto">
            	<option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select></td></tr>
            <tr><td></td><td><input type="submit" class="mediano"></td></tr>
        </table>
        </form>
    </div>
</div>
<div class="clear"></div>
<?php
include_once("../pie.php");
?>