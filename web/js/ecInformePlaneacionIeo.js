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
	for (i = 1; i <=23 ; i++) 
	{ 
		valor += $("#ecavances-"+i+"-estado_actual").val()*1;
		
		
		switch (i) 
		{
			
			//Proyecto Pedagógicos Transversales primeros 3 indicadores
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
				i = 14
			break;
			//Proyecto Pedagógicos Transversales
			
			//Proyecto de Servicio Social Estudiantil primeros 3 indicadores
			case 17:
				porcentajeAvanceGestion= Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 20:
				porcentajeAvanceProyectos = Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 23:
				porcentajeAvanceCompetencias= Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			//Proyecto de Servicio Social Estudiantil
			
		}	
	}
	
	//Proyecto Pedagógicos Transversales
	$("#porcentajeAvance1").css({"width": ""+PorcentajeAvanceProceso      +"%","background-color":""+colorBarra(PorcentajeAvanceProceso)}).text(PorcentajeAvanceProceso+"%");	
	$("#porcentajeAvance2").css({"width": ""+porcentajeAvanceEstrategias  +"%","background-color":""+colorBarra(porcentajeAvanceEstrategias)}).text(porcentajeAvanceEstrategias+"%");
	$("#porcentajeAvance3").css({"width": ""+porcentajeAvanceOrientaciones+"%","background-color":""+colorBarra(porcentajeAvanceOrientaciones)}).text(porcentajeAvanceOrientaciones+"%");
	
	//Proyecto de Servicio Social Estudiantil
	$("#porcentajeAvance5").css({"width": ""+porcentajeAvanceGestion+"%","background-color":""+colorBarra(porcentajeAvanceGestion)}).text(porcentajeAvanceGestion+"%");
	$("#porcentajeAvance6").css({"width": ""+porcentajeAvanceProyectos+"%","background-color":""+colorBarra(porcentajeAvanceProyectos)}).text(porcentajeAvanceProyectos+"%");
	$("#porcentajeAvance7").css({"width": ""+porcentajeAvanceCompetencias+"%","background-color":""+colorBarra(porcentajeAvanceCompetencias)}).text(porcentajeAvanceCompetencias+"%");
	
	
	
	for (j = 1; j <=17 ; j++) 
	{ 
		valor += $("#ecrespuestas-"+j+"-respuesta").val()*1;
		switch (j) 
		{
			//Proyecto Pedagógicos Transversales ultimo indicador
			case 5:
				porcentajeAvanceProductos1     = Math.trunc(((valor)/20)*100);
				valor =0;
				i=11
			break;
			
			//Proyecto de Servicio Social Estudiantil ultimo indicador
			case 17:
				porcentajeAvanceProductos2 = Math.trunc(((valor)/20)*100);
				valor =0;
			break;
			
			// case 9:
				// porcentajeAvanceOrientaciones = Math.trunc(((valor)/12)*100);
				// valor =0;
			// break;
			
		}	
	}
	
	
	$("#porcentajeAvance4").css({"width": ""+porcentajeAvanceProductos1+"%","background-color":""+colorBarra(porcentajeAvanceProductos1)}).text(porcentajeAvanceProductos1+"%");
	$("#porcentajeAvance8").css({"width": ""+porcentajeAvanceProductos2+"%","background-color":""+colorBarra(porcentajeAvanceProductos2)}).text(porcentajeAvanceProductos2+"%");
	

	
});

