$( document ).ready(function()
{
	//solo numeron en la caja de estudiantes
	$('div[id *= estudiantesimpieo],[id *= grado]').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
	});

});
	
//selector para seleccionar solo las celdas de estudiantes
//hace la sumatoria y la asigna a total
$('div[id *= estudiantesimpieo],[id *= grado]').keyup(function() 
{
	total =0;
	
	//numero del que identifica a la caja de texto Estudiantes Gra para saber a que total debe sumar
	ValId = $(this).attr("id");
	num = ValId.split("-");
	
	//cuando se presione un numero se hace la suma
	$('[id *= estudiantesimpieo-'+num[1]+'-grado]').each(function( ) 
	{
	  total += $(this).val()*1;
	});

	//se asigna la suma total a la caja de texto correspondiente
	$("#estudiantesimpieo-"+num[1]+"-total").val(total);

});