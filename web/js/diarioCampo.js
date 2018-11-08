$( document ).ready(function() {
    
	
	// $("#principal").hide();
	
	
		// llenarPerfilesSelected();
});



//llenar las comunas segun el municipio que seleccione
$( "#selFases" ).change(function() 
{
	
	faseO = $( "#selFases" ).val();
	anio = $( "#selAnio" ).val();
	ciclo = $( "#selCiclo" ).val();
	
	 if(faseO != "" && anio != "" && ciclo != "" )
	 {
		 if(faseO == 1){fase=14; titulo="BITACORA FASE I"; descripcion=17; hallazgo=20;}
		 else if(faseO == 2){fase = 15; titulo="BITACORA FASE II"; descripcion=18; hallazgo=21;}
		 else if(faseO == 3){fase = 16; titulo="BITACORA FASE III"; descripcion=19; hallazgo=22;}
		$.get( "index.php?r=semilleros-tic-diario-de-campo/opciones-ejecucion-diario-campo&idFase="+fase+"&descripcion="+descripcion+"&hallazgo="+hallazgo+"&idAnio="+anio+"&idCiclo="+ciclo+"&faseO="+faseO,
				function( data )
					{			
						alert(data.contenido+"-"+data.contenido1);
						
								// if (typeof data.contenido === undefined || typeof data.contenido1 === undefined){
								if (data.contenido =="" || data.contenido1 ==""){
									
									swal("Importante", data.mensaje, "info");
									alert(0);
								}
								else{
									$("#contenido").html(data.contenido);
									$("#contenido1").html(data.contenido1);
									
									$("#contenido").show();
									$("#contenido1").show(); 
									 alert(1);
								}
							$("#encabezado").html(data.html);
							$("#encabezado1").html(data.html1);
							
							$("#titulo").show();
							$("#encabezado").show();
							$("#encabezado1").show();
							
						
						
						$("#titulo").html(titulo);
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
		 
		 swal("Importante", "Debe seleccionar año, ciclo y fase", "error");
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



