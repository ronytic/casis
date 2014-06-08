<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once 'excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
//$data->setOutputEncoding('CP1251');
//$data->setUTFEncoder('mb');
$data->setUTFEncoder('iconv');
$data->setOutputEncoding('UTF-8');

$data->read('archivo/casis 2014.xls');;
error_reporting(E_ALL ^ E_NOTICE);
/*echo $data->sheets[0]['cells'][1][1];
echo $data->sheets[0]['cells'][3][1];
echo "<br>";*/
/*foreach($data->sheets as $x => $y){
   echo "$x = $y<br>";
   echo "<pre>";
   print_r($y);
   echo "</pre>";
}*/
$ru=1;
$paterno=2;
$materno=3;
$nombres=4;
$ci=5;
$genero=6;
include_once("../class/alumnos.php");
$alumnos=new alumnos;

$celdas=$data->sheets[0]['cells'];
array_shift($celdas);
foreach($celdas as $x => $y){
	echo "<pre>";
	print_r($y);
	echo "</pre>";
	
	$dru=$y[$ru];
	$dpaterno=$y[$paterno];
	$dmaterno=$y[$materno];
	$dnombres=$y[$nombres];
	$dci=$y[$ci];
	$dgenero=$y[$genero];
	
	$al=$alumnos->mostrarDatosXCi($dci);
	if(count($al)){
		$values=array("Nombres"=>"'$dnombres'",
					"Paterno"=>"'$dpaterno'",
					"Materno"=>"'$dmaterno'",
					"Ru"=>"'$dru'",
					"Ci"=>"'$dci'",
					"Genero"=>"'$dgenero'",
					"Valido"=>1
					);
		$alumnos->$actualizarAlumno($values,"Ci=".$dci);
	}else{
		
	
		$values=array("Nombres"=>"'$dnombres'",
					"Paterno"=>"'$dpaterno'",
					"Materno"=>"'$dmaterno'",
					"Ru"=>"'$dru'",
					"Ci"=>"'$dci'",
					"Genero"=>"'$dgenero'",
					"Valido"=>1
					);
		$alumnos->registrarAlumno($values);
	}	
	echo $dru." | ".$dpaterno." | ".$dmaterno." | ".($dnombres)." | ".$dci." | ".$dgenero." | <br>";
}

/*
echo "<br>";
foreach($data->sheets as $x => $y){
   echo "$x = {$data->boundsheets[$x]['name']}<br>";
}

*/
?>