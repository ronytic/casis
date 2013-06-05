<?php
include_once("login/check.php");
include_once("config.php");
$Nivel=$_SESSION['Nivel'];
function isIPad(){
	return (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
}
if(isIPad()){
$tipo="number";	
}else{
$tipo="text";	
}
$folder="";
include_once("cabecerahtml.php");
?>

<script language="javascript" type="text/javascript" src="js/script.js"></script>
<?php
include_once("cabecera.php");
?>

	<div class="prefix_1 grid_10 suffix_1">
    	<div id="respuesta" class="">

        </div>	
    </div>
    <div class="clear"></div>
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="resaltarcuerpo corner-all">
        	<form action="registrar.php" method="post" id="formulario">
                <label for="ru">R.U./C.I.:</label><input type="<?php echo $tipo?>" name="ru" autofocus class="campotexto corner-all" id="ru" autocomplete="off" size="6"/><hr />
                <input type="submit" value="Registrar" />
            </form>
        </div>
    </div>
    <div class="clear"></div>
    	<?php include_once("pie.php");?>
