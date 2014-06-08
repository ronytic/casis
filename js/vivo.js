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
	
	$('#anuncio').marquee({
		//speed in milliseconds of the marquee
    duration: 15000,
    //gap in pixels between the tickers
    gap: 50,
    //time in milliseconds before the marquee will start animating
    delayBeforeStart: 0,
    //'left' or 'right'
    direction: 'left',
    //true or false - should the marquee be duplicated to show an effect of continues flow
    duplicated: true
	});
});