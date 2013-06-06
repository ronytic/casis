<?php
include_once("../class/alumnos.php");

$alumnos=new alumnos;

$numci=search();
if($numci!="")
{
	echo $numci;
}else{
	echo "00000000";	
}

function search()
{
	$Fecha=date("Y-m-d");
	$sql="SELECT a.Ci from alumnos a,asistencia asis WHERE asis.CodAlumno=a.CodAlumno and asis.Sorteado=0 and asis.FechaRegistro='$Fecha'";
	$res=mysql_query($sql);
	$c=mysql_num_rows($res);

	$ci=array();
	while($reg=mysql_fetch_array($res)):
		array_push($ci,$reg['Ci']);
	endwhile;
	//print_r($ci);
	for($i=1;$i<=10;$i++){
		//echo "<br>";
		$ci=shuffle_assoc($ci);
		//print_r($ci);
	}
	$numci=array_shift($ci);
	return $numci;
}
function shuffle_assoc($list) { 
  if (!is_array($list)) return $list; 

  $keys = array_keys($list); 
  shuffle($keys); 
  $random = array(); 
  foreach ($keys as $key) 
    $random[$key] = $list[$key]; 

  return $random; 
} 
?>