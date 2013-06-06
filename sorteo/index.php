<?php
include_once("../login/check.php");
$folder="../";
include_once("../cabecerahtml.php");
?>
<link href="css/estilo.css" type="text/css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="../js/jquery.hotkeys.js"></script>
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<?php
include_once("../cabecera.php");
?>
<div class="grid_12">
    <div id="randomnumber">
    <input type="text" class="text" id="n8" value="0" readonly="readonly" />
    <input type="text" class="text" id="n7" value="0" readonly="readonly"/>
    <input type="text" class="text" id="n6" value="0" readonly="readonly"/>
    <input type="text" class="text" id="n5" value="0" readonly="readonly"/>
    <input type="text" class="text" id="n4" value="0" readonly="readonly"/>
    <input type="text" class="text" id="n3" value="0" readonly="readonly"/>
    <input type="text" class="text" id="n2" value="0" readonly="readonly"/>
    <input type="text" class="text" id="n1" value="0" readonly="readonly"/>
    </div>
    <div id="randomnumber2">
    <input type="text" class="text1" id="nc8" value="0" readonly="readonly" />
    <input type="text" class="text1" id="nc7" value="0" readonly="readonly"/>
    <input type="text" class="text1" id="nc6" value="0" readonly="readonly"/>
    <input type="text" class="text1" id="nc5" value="0" readonly="readonly"/>
    <input type="text" class="text1" id="nc4" value="0" readonly="readonly"/>
    <input type="text" class="text1" id="nc3" value="0" readonly="readonly"/>
    <input type="text" class="text1" id="nc2" value="0" readonly="readonly"/>
    <input type="text" class="text1" id="nc1" value="0" readonly="readonly"/>
    </div>
</div>
<div class="prefix_2 grid_8 suffix_2">
<div id="result" class="">
	
</div>

<div id="control"><input type="button" value="Girar" class="boton" id="girar"/><input type="button" value="Parar" class="boton" id="parar"/><input type="button" value="Resetear" class="boton" id="reset"/><input type="button" value="Mostrar" class="boton" id="showname"/></div>
</div>
<div class="clear"></div>
</div>
</body>
</html>
