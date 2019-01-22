
$( document ).ready(function()
{
    
	//solo numeron en la caja de estudiantes
	$('div[id *= cantidadpoblacionimpieo],[id *= tiempo_libre]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    
    $('div[id *= cantidadpoblacionimpieo],[id *= edu_derechos]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= cantidadpoblacionimpieo],[id *= sexualidad]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= cantidadpoblacionimpieo],[id *= ciudadania]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= cantidadpoblacionimpieo],[id *= medio_ambiente]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= cantidadpoblacionimpieo],[id *= familia]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= cantidadpoblacionimpieo],[id *= directivos]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
	});

});
	
//selector para seleccionar solo las celdas de estudiantes
//hace la sumatoria y la asigna a total
$('div[id *= cantidadpoblacionimpieo],[id *= tiempo_libre]').keyup(function() 
{
    total = 0;
	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
	
	//cuando se presione un numero se hace la suma
	$('[id *= cantidadpoblacionimpieo-'+num[1]+'-tiempo_libre]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#cantidadpoblacionimpieo-"+num[1]+"-total").val(total);

});

$('div[id *= cantidadpoblacionimpieo],[id *= edu_derechos]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#cantidadpoblacionimpieo-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= cantidadpoblacionimpieo-'+num[1]+'-edu_derechos]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#cantidadpoblacionimpieo-"+num[1]+"-total").val(total);

});

$('div[id *= cantidadpoblacionimpieo],[id *= sexualidad]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#cantidadpoblacionimpieo-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= cantidadpoblacionimpieo-'+num[1]+'-sexualidad]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#cantidadpoblacionimpieo-"+num[1]+"-total").val(total);

});

$('div[id *= cantidadpoblacionimpieo],[id *= ciudadania]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#cantidadpoblacionimpieo-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= cantidadpoblacionimpieo-'+num[1]+'-ciudadania]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#cantidadpoblacionimpieo-"+num[1]+"-total").val(total);

});

$('div[id *= cantidadpoblacionimpieo],[id *= medio_ambiente]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#cantidadpoblacionimpieo-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= cantidadpoblacionimpieo-'+num[1]+'-medio_ambiente]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#cantidadpoblacionimpieo-"+num[1]+"-total").val(total);

});

$('div[id *= cantidadpoblacionimpieo],[id *= familia]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#cantidadpoblacionimpieo-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= cantidadpoblacionimpieo-'+num[1]+'-familia]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#cantidadpoblacionimpieo-"+num[1]+"-total").val(total);

});

$('div[id *= cantidadpoblacionimpieo],[id *= directivos]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#cantidadpoblacionimpieo-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= cantidadpoblacionimpieo-'+num[1]+'-directivos]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#cantidadpoblacionimpieo-"+num[1]+"-total").val(total);

});





