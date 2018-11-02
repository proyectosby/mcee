$( document ).ready(function() {
    
	
	// $("#principal").hide();
	
	
		// llenarPerfilesSelected();
});



//llenar las comunas segun el municipio que seleccione
$( "#selFases" ).change(function() 
{
	
	fase = $( "#selFases" ).val();
	anio = $( "#selAnio" ).val();
	ciclo = $( "#selCiclo" ).val();
	
	 if(fase != "")
	 {
		 if(fase == 1){fase=14; titulo="BITACORA FASE I"; descripcion=17; hallazgo=20;}
		 else if(fase == 2){fase = 15; titulo="BITACORA FASE II"; descripcion=18; hallazgo=21;}
		 else if(fase == 3){fase = 16; titulo="BITACORA FASE III"; descripcion=19; hallazgo=22;}
		$.get( "index.php?r=semilleros-tic-diario-de-campo/opciones-ejecucion-diario-campo&idFase="+fase+"&descripcion="+descripcion+"&hallazgo="+hallazgo+"&idAnio="+anio+"&idCiclo="+ciclo,
				function( data )
					{			
						
						if (data.html != ""){
							$("#titulo").html(titulo);
							$("#encabezado").html(data.html);
							$("#contenido").html(data.contenido);
							$("#encabezado1").html(data.html1);
							$("#contenido1").html(data.contenido1);
							$("#titulo").show();
							$("#encabezado").show();
							$("#contenido").show();
							$("#encabezado1").show();
							$("#contenido1").show();
						}
						
						$("#descripcion").html(data.descripcion);
						$("#hallazgos").html(data.hallazgos);
						
															
					},
			"json");   
	 }
	 else{
		 $("#titulo").hide(titulo);
		 $("#encabezado").hide();
		 $("#contenido").hide();
		 $("#encabezado1").hide();
		 $("#contenido1").hide();
		 }
});

//llenar los barrios segun la comuna que seleccione
$( "#personas-comuna" ).change(function() 
{
	idComunas = $( "#personas-comuna" ).val();
	alert
	if(idMunicipio != "")
	{
		$.get( "index.php?r=personas/barrios&idComunas="+idComunas,
				function( data )
					{	
						
						$("#personas-id_barrios_veredas").append(data);
						$("#personas-id_barrios_veredas").val(selectIdBarrios);
					},
			"json");   
	}
});



