$( document ).ready(function(){
	

	
});

//semaforizacion segun documento 3A
function colorBarra(valor)
{
	color ="";
	if(valor < 50)
	{
		color = "red";
	}
	else if(valor < 70)
	{
		color = "yellow";
	}
	else if (valor < 100)
	{
		color = "green";
	}
	else
	{
		color ="blue";
	}
	return color;
}

//calcula los porcentaje de avances 
$( "#porcentajes" ).click(function() 
{
	estadoActual2 = $("#ecavances-2-estado_actual").val()*1;
	estadoActual1 = $("#ecavances-1-estado_actual").val()*1;
	estadoActual3 = $("#ecavances-3-estado_actual").val()*1;
	
	PorcentajeAvanceProceso = Math.trunc(((estadoActual1 + estadoActual2 + estadoActual3)/12)*100);
	
	$("#porcentajeAvance1").css({"width": ""+PorcentajeAvanceProceso+"%","background-color":""+colorBarra(PorcentajeAvanceProceso)}).text(PorcentajeAvanceProceso+"%");

	
	estadoActual4 = $("#ecavances-4-estado_actual").val()*1;
	estadoActual6 = $("#ecavances-6-estado_actual").val()*1;
	estadoActual5 = $("#ecavances-5-estado_actual").val()*1;

	porcentajeAvanceEstrategias = Math.trunc(((estadoActual4 + estadoActual6 + estadoActual5)/12)*100);
	
	
	$("#porcentajeAvance2").css({"width": ""+porcentajeAvanceEstrategias+"%","background-color":""+colorBarra(porcentajeAvanceEstrategias)}).text(porcentajeAvanceEstrategias+"%");
	
	estadoActual9 = $("#ecavances-9-estado_actual").val()*1;
	estadoActual8 = $("#ecavances-8-estado_actual").val()*1;
	estadoActual7 = $("#ecavances-7-estado_actual").val()*1;
	
	porcentajeAvanceOrientaciones = Math.trunc(((estadoActual9 + estadoActual8 + estadoActual7)/12)*100);
	
	
	$("#porcentajeAvance3").css({"width": ""+porcentajeAvanceOrientaciones+"%","background-color":""+colorBarra(porcentajeAvanceOrientaciones)}).text(porcentajeAvanceOrientaciones+"%");
	
	estadoActual9 = $("#ecavances-9-estado_actual").val()*1;
	estadoActual8 = $("#ecavances-8-estado_actual").val()*1;
	estadoActual7 = $("#ecavances-7-estado_actual").val()*1;
	
	porcentajeAvanceProductos = Math.trunc(((estadoActual9 + estadoActual8 + estadoActual7)/12)*100);
	
	$("#porcentajeAvance3").css({"width": ""+porcentajeAvanceProductos+"%","background-color":""+colorBarra(porcentajeAvanceProductos)}).text(porcentajeAvanceProductos+"%");
	
	
	
	
	
});

