$(document).ready(function(e) {
	actualizar();
	function actualizar(){
		$.post("listar.php",respuestahtml);	
		$.post("total.php",cantidad,"json");
		//respuestahtml("1");
	}
	function cantidad(data){
		$("span#total").html(data.total)
		
		$("span#permisos").html(data.permisos)
	}
	function respuestahtml(data){
		$("#ultimos").html(data);
		setTimeout(actualizar,2000);
	}
});