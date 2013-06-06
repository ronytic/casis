<?php
include_once("../login/check.php");
$folder="../";
include_once("../cabecerahtml.php");
function isIPad(){
	return (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
}
if(isIPad()){
$tipo="number";	
}else{
$tipo="text";	
}
?>
<script language="javascript" type="text/javascript" src="../js/script.js"></script>
</head>
<body>

<?php
include_once("../cabecera.php");
?>
<div class="prefix_2 grid_8 suffix_2">
    	<div id="respuesta" class="">

        </div>	
    </div>
    <div class="clear"></div>
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="resaltarcuerpo corner-all">
        	<h3>PERMISO</h3>
        	<form action="registrarpermiso.php" method="post" id="formulario">
                <label for="ru">R.U./C.I.:</label><input type="<?php echo $tipo?>" name="ru" autofocus class="campotexto corner-all" id="ru" autocomplete="off" size="6"/><hr />
                <input type="submit" value="PERMISO" />
            </form>
        </div>
    </div>
    <div class="clear"></div>
<?php
include_once("../pie.php");
?>