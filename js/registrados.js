$(document).ready(function(e) {
    $("#revisar").click(function(e) {
    	var fecha=$("#fecha").val();
		$.post("mostrarAsistentes.php",{"fecha":fecha},respuesta);
    });
	function respuesta(data){
		$("#respuesta").html(data)
	}
});