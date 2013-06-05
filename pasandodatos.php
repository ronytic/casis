<?php
include_once("basedatos.php");
mysql_connect($host,$user,$pass);
mysql_select_db($database);
$res=mysql_query("SELECT * FROM alumnos2");
while($reg=mysql_fetch_array($res)){
	$sql="UPDATE alumnos SET Paterno='{$reg['Paterno']}',Materno='{$reg['Materno']}',Nombres='{$reg['Nombres']}' WHERE Ru='{$reg['Ru']}' and Ci='{$reg['Ci']}'";
	mysql_query($sql);

}
?>