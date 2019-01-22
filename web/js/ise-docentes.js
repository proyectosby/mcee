
$( document ).ready(function()
{
    
	//solo numeron en la caja de estudiantes
	$('div[id *= ectipocantidadpoblacionise],[id *= tiempo_libre]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    
    $('div[id *= ectipocantidadpoblacionise],[id *= edu_derechos]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= ectipocantidadpoblacionise],[id *= sexualidad_ciudadania]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });

    $('div[id *= ectipocantidadpoblacionise],[id *= medio_ambiente]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= ectipocantidadpoblacionise],[id *= familia]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= ectipocantidadpoblacionise],[id *= directivos]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
	});

});
	
//selector para seleccionar solo las celdas de estudiantes
//hace la sumatoria y la asigna a total
$('div[id *= ectipocantidadpoblacionise],[id *= tiempo_libre]').keyup(function() 
{
    total = 0;
	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
	
	//cuando se presione un numero se hace la suma
	$('[id *= ectipocantidadpoblacionise-'+num[1]+'-tiempo_libre]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#ectipocantidadpoblacionise-"+num[1]+"-total").val(total);

});

$('div[id *= ectipocantidadpoblacionise],[id *= edu_derechos]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#ectipocantidadpoblacionise-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= ectipocantidadpoblacionise-'+num[1]+'-edu_derechos]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#ectipocantidadpoblacionise-"+num[1]+"-total").val(total);

});

$('div[id *= ectipocantidadpoblacionise],[id *= sexualidad_ciudadania]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#ectipocantidadpoblacionise-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= ectipocantidadpoblacionise-'+num[1]+'-sexualidad_ciudadania]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#ectipocantidadpoblacionise-"+num[1]+"-total").val(total);

});



$('div[id *= ectipocantidadpoblacionise],[id *= medio_ambiente]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#ectipocantidadpoblacionise-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= ectipocantidadpoblacionise-'+num[1]+'-medio_ambiente]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#ectipocantidadpoblacionise-"+num[1]+"-total").val(total);

});

$('div[id *= ectipocantidadpoblacionise],[id *= familia]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#ectipocantidadpoblacionise-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= ectipocantidadpoblacionise-'+num[1]+'-familia]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#ectipocantidadpoblacionise-"+num[1]+"-total").val(total);

});

$('div[id *= ectipocantidadpoblacionise],[id *= directivos]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#ectipocantidadpoblacionise-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= ectipocantidadpoblacionise-'+num[1]+'-directivos]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#ectipocantidadpoblacionise-"+num[1]+"-total").val(total);

});





