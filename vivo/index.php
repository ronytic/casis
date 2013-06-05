<?php
include_once("../login/check.php");
include_once("../class/asistencia.php");
include_once("../class/alumnos.php");
$folder="../";
$titulo="ÚLTIMOS INGRESOS";
$asistencia=new asistencia;
$alumnos=new alumnos;
$Fecha=date("Y-m-d");
?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/vivo.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
	<div class="grid_2">
    	<div class="lateral">
	    	Total<hr /><span id="total"></span>
        </div>
    </div>
    <div class="grid_8" id="ultimos">
    
    </div>
    <div class="grid_2" id="salieron">
    	<div class="lateral">
    	Salidas<hr /><span id="permisos"></span>
        </div>
    </div>
    <div class="clear"></div>
</div>
</body>
</html>
