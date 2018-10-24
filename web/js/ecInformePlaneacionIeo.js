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
	
	var i;
	valor = 0;
	for (i = 1; i <=9 ; i++) 
	{ 
		valor += $("#ecavances-"+i+"-estado_actual").val()*1;
		
		
		switch (i) 
		{
			case 3:
				PorcentajeAvanceProceso     = Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 6:
				porcentajeAvanceEstrategias = Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 9:
				porcentajeAvanceOrientaciones = Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
		}	
	}
	
	$("#porcentajeAvance1").css({"width": ""+PorcentajeAvanceProceso      +"%","background-color":""+colorBarra(PorcentajeAvanceProceso)}).text(PorcentajeAvanceProceso+"%");	
	$("#porcentajeAvance2").css({"width": ""+porcentajeAvanceEstrategias  +"%","background-color":""+colorBarra(porcentajeAvanceEstrategias)}).text(porcentajeAvanceEstrategias+"%");
	$("#porcentajeAvance3").css({"width": ""+porcentajeAvanceOrientaciones+"%","background-color":""+colorBarra(porcentajeAvanceOrientaciones)}).text(porcentajeAvanceOrientaciones+"%");
	
	
	
	for (j = 1; j <=5 ; j++) 
	{ 
		valor += $("#ecrespuestas-"+j+"-respuesta").val()*1;
		switch (j) 
		{
			case 5:
				porcentajeAvanceProductos     = Math.trunc(((valor)/20)*100);
				valor =0;
			break;
			
			// case 6:
				// porcentajeAvanceEstrategias = Math.trunc(((valor)/12)*100);
				// valor =0;
			// break;
			
			// case 9:
				// porcentajeAvanceOrientaciones = Math.trunc(((valor)/12)*100);
				// valor =0;
			// break;
			
		}	
	}
	
	
	$("#porcentajeAvance4").css({"width": ""+porcentajeAvanceProductos+"%","background-color":""+colorBarra(porcentajeAvanceProductos)}).text(porcentajeAvanceProductos+"%");
	

	
});

