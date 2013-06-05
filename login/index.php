<?php
$folder="../";
include_once("../config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?> | Acceso al Sistema</title>
<link href="../css/960/960.css" type="text/css" rel="stylesheet" media="all" />
<link href="../css/core.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" media="all" />
<link rel="shortcut icon" href="../images/solteca.ico" />
<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/login.js"></script>
</head>
<body>
<div class="container_12" id="wrapper">
	<div class="grid_2" >
    	<img src="<?php echo $folder;?>images/logo.png" id="logo">
    </div>
    <div class="grid_10" id="lema">
    	<img src="<?php echo $folder;?>images/lema.png">
    </div>
    <div class="clear"></div>
	<div class="prefix_2 grid_8 suffix_2">
    	<h1><?php echo $titulo;?></h1>
    </div>
    <div class="clear"></div>
</div>
<div class="container_12" id="wrapper">
    <div class="prefix_4 grid_4 suffix_4">
		<div id="formLogin" class="corner-all">
        	<div class="titulo corner-top">Acceso al sistema</div>
            <div class="cuerpo">
            	<?php
				if($_GET['incompleto']){
				?>
            	<div class="rojoC">Por favor introdusca TODOS los DATOS</div>
                <?php
				}
				if($_GET['error']){
				?>
            	<div class="naranjaC">El USUARIO o la CONTRASEÑA son incorrectos, verifique e intente nuevamente</div>
                <?php
				}
				?>
            	<form action="login.php" method="post" id="login">
               		<input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" autofocus="autofocus"/><br />
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass"/><br />
                    <input type="submit" value="Ingresar" class="corner-all"/>
                </form>
            </div>
        </div>    
    </div>
    <br /><br /><br /><br /><br />
    <div class="clear"></div>
 
</div>
</body>
</html>