$(document).ready(function(){
	$("#ver").submit(function(e){
		e.preventDefault();
		var ru=$("#ru").val();
		$.post("lista.php",{'Ru':ru},function(data){$("#respuesta").html(data);});
	});
});