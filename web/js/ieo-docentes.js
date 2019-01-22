
$( document ).ready(function()
{
    
	//solo numeron en la caja de estudiantes
	$('div[id *= tiposcantidadpoblacion],[id *= tiempo_libre]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    
    $('div[id *= tiposcantidadpoblacion],[id *= edu_derechos]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= tiposcantidadpoblacion],[id *= sexualidad]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= tiposcantidadpoblacion],[id *= ciudadania]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= tiposcantidadpoblacion],[id *= medio_ambiente]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= tiposcantidadpoblacion],[id *= familia]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('div[id *= tiposcantidadpoblacion],[id *= directivos]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
	});

});
	
//selector para seleccionar solo las celdas de estudiantes
//hace la sumatoria y la asigna a total
$('div[id *= tiposcantidadpoblacion],[id *= tiempo_libre]').keyup(function() 
{
    total = 0;
	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
	
	//cuando se presione un numero se hace la suma
	$('[id *= tiposcantidadpoblacion-'+num[1]+'-tiempo_libre]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#tiposcantidadpoblacion-"+num[1]+"-total").val(total);

});

$('div[id *= tiposcantidadpoblacion],[id *= edu_derechos]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#tiposcantidadpoblacion-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= tiposcantidadpoblacion-'+num[1]+'-edu_derechos]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#tiposcantidadpoblacion-"+num[1]+"-total").val(total);

});

$('div[id *= tiposcantidadpoblacion],[id *= sexualidad]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#tiposcantidadpoblacion-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= tiposcantidadpoblacion-'+num[1]+'-sexualidad]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#tiposcantidadpoblacion-"+num[1]+"-total").val(total);

});

$('div[id *= tiposcantidadpoblacion],[id *= ciudadania]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#tiposcantidadpoblacion-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= tiposcantidadpoblacion-'+num[1]+'-ciudadania]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#tiposcantidadpoblacion-"+num[1]+"-total").val(total);

});

$('div[id *= tiposcantidadpoblacion],[id *= medio_ambiente]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#tiposcantidadpoblacion-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= tiposcantidadpoblacion-'+num[1]+'-medio_ambiente]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#tiposcantidadpoblacion-"+num[1]+"-total").val(total);

});

$('div[id *= tiposcantidadpoblacion],[id *= familia]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#tiposcantidadpoblacion-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= tiposcantidadpoblacion-'+num[1]+'-familia]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#tiposcantidadpoblacion-"+num[1]+"-total").val(total);

});

$('div[id *= tiposcantidadpoblacion],[id *= directivos]').keyup(function() 
{
    	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
    
    total = $("#tiposcantidadpoblacion-"+num[1]+"-total").val()*1;
    
	//cuando se presione un numero se hace la suma
	$('[id *= tiposcantidadpoblacion-'+num[1]+'-directivos]').each(function( ) 
	{
	  total += $(this).val()*1;
	});
    
    //se asigna la suma total a la caja de texto correspondiente
   

	$("#tiposcantidadpoblacion-"+num[1]+"-total").val(total);

});





