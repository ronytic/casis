var delay=50;var swp=0;var vn1=0;var vn2=0;var vn3=0;var vn4=0;var vn5=0;var vn6=0;var vn7=0;var vn8=0;
var ci,cinormal,cihombre,cimujer;
$(document).ready(function(){
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
	
	buscar();  
	
	/*Girar*/
	$('#n1').val('1');
	$('#n2').val('2');
	$('#n3').val('3');
	$('#n4').val('4');
	$('#n5').val('5');
	$('#n6').val('6');
	$('#n7').val('7');
	$('#n8').val('8');
	girar1();girar2();girar3();girar4();girar5();girar6();girar7();girar8()
	/*Fin Girar*/
	$('#girar').click(function(){
		//$('#randomnumber').fadeIn(0);
		//$('#randomnumber2').fadeOut(0);    
		$('#reset').click()
	});
	$('#parar').click(function(){
	   //$.post('search.php',response);
	   //$(".text").slideUp();
		$('#randomnumber').fadeOut(0); 
		$('#randomnumber2').fadeIn(0);  
	});
	/*alert('Ci:  '+cinormal);
		alert('CiH: '+cihombre);
		alert('CiM: '+cimujer); */
	$(document).on('keypress',null,'v',function(e){e.preventDefault();$('#showname').click()});
	$(document).on('keypress',null,'q',function(e){e.preventDefault();$('#reset').click()});
	$(document).on('keypress',null,'w',function(e){e.preventDefault();response(cinormal);$('#parar').click();});
	$(document).on('keypress',null,'h',function(e){e.preventDefault();response(cihombre);$('#parar').click();});
	$(document).on('keypress',null,'m',function(e){e.preventDefault();response(cimujer);$('#parar').click();});
	$(document).on('keypress',null,'r',function(e){e.preventDefault();$('#reset').click();});
	$('#girar').click();
	$('#showname').click(function(){
		$('#parar').click();
		$.post('searchname.php',{'ci':ci},responsename);
		
	});
	$('#reset').click(function(){
		if(swp==1)
		{
			swp=0;
			delay=50;
			$('.text1').each(function(){
				$(this).val('0');
				
			});
			$('#result').slideUp(500);
			$('#randomnumber').fadeIn(0); 
			$('#randomnumber2').fadeOut(0);
			buscar();
			
		}
	});
});
function buscar(){
	$.post('search.php',function(data){cinormal=data;});	
	$.post('search.php',{'genero':'M'},function(data){cihombre=data;});	
	$.post('search.php',{'genero':'F'},function(data){cimujer=data;});	
}
function girar1()
{
	var n=parseInt($('#n1').val());
	n=n+1;
	if(n==10)
	{
		$('#n1').val('0');
		n=0;
	}
	else 
	{$('#n1').val(n);}
		setTimeout('girar1();',delay);
}
function girar2()
{
	var n=parseInt($('#n2').val());
	n=n+1;
	if(n==10)
	{
		$('#n2').val('0');
		n=0;
	}else
	{$('#n2').val(n);}
	setTimeout('girar2();',delay);
}
function girar3()
{
	var n=parseInt($('#n3').val());
	n=n+1;
	if(n==10)
	{
		$('#n3').val('0');
		n=0
	}else
	{
		$('#n3').val(n);
	}
	setTimeout('girar3();',delay);
}
function girar4()
{
	var n=parseInt($('#n4').val());
	n=n+1;
	if(n==10)
	{
		$('#n4').val('0');
		n=0;
	}else
	{$('#n4').val(n);}
		setTimeout('girar4();',delay)
}
function girar5()
{
	var n=parseInt($('#n5').val());
	n=n+1;
	if(n==10)
	{
		$('#n5').val('0');
		n=0;
	}else 
	{$('#n5').val(n);}
		setTimeout('girar5();',delay);
}
function girar6()
{
	var n=parseInt($('#n6').val());
	n=n+1;
	if(n==10)
	{
		$('#n6').val('0');n=0
	}else 
	{$('#n6').val(n);}
		setTimeout('girar6();',delay);
}
function girar7()
{
	var n=parseInt($('#n7').val());
	n=n+1;
	if(n==10)
	{
		$('#n7').val('0');
		n=0;
	}else
	{$('#n7').val(n);}
		setTimeout('girar7();',delay);
}
function girar8()
{
	var n=parseInt($('#n8').val());
	n=n+1;
	if(n==10)
	{
		$('#n8').val('0');
		n=0;
	}else{$('#n8').val(n);}
		setTimeout('girar8();',delay);
}
function response(data)
{
	ci=data;
	var lon=data.length;
	swp=1;
	vn1=data[lon-1];
	vn2=data[lon-2];
	vn3=data[lon-3];
	vn4=data[lon-4];
	vn5=data[lon-5];
	vn6=data[lon-6];
	vn7=data[lon-7];
	vn8=data[lon-8];
	if(lon==5){vn6=0};
	if(lon==6){vn7=0};
	if(lon==7){vn8=0};
	$('#nc1').val(vn1);
	$('#nc2').val(vn2);
	$('#nc3').val(vn3);
	$('#nc4').val(vn4);
	$('#nc5').val(vn5);
	$('#nc6').val(vn6);
	$('#nc7').val(vn7);
	$('#nc8').val(vn8);
}
function responsename(data){
	$('#result').html(data);
	$('#result').slideDown(500);
}