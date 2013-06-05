$(document).ready(function(e) {
    if ((navigator.userAgent.indexOf('iPhone') != -1) || (navigator.userAgent.indexOf('iPod') != -1)  || (navigator.userAgent.indexOf('iPad') != -1) ){
		
		
	}
	$("#formulario").submit(function(e) {
		var ru=$("#ru").val();
		var target=$(this).attr("action");
		e.preventDefault();
		e.stopPropagation();
		if(ru!=""){
			$("#respuesta").hide()
       		$.post(target,{"ru":ru},respuesta,"json");
		}
    });
	function respuesta(data){
		switch(data.Tipo){
			case "Ok":{$("#respuesta").html(data.Mensaje).removeClass("naranjaC rojoC").addClass("verdeC corner-all").fadeIn()}break;	
			case "Repeat":{$("#respuesta").html(data.Mensaje).removeClass("verdeC rojoC").addClass("naranjaC corner-all").fadeIn()}break;	
			case "Empty":{$("#respuesta").html(data.Mensaje).removeClass("naranjaC verdeC").addClass("rojoC corner-all").fadeIn()}break;	
			case "OkPermiso":{$("#respuesta").html(data.Mensaje).removeClass("naranjaC rojoC").addClass("verdeC corner-all").fadeIn()}break;	
			case "RetornoPermiso":{$("#respuesta").html(data.Mensaje).removeClass("verdeC rojoC").addClass("naranjaC corner-all").fadeIn()}break;	
		}
		$("#ru").val("");
	}
});
