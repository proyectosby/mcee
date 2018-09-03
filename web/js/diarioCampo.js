$( document ).ready(function() {
    
	
	// $("#principal").hide();
	
	
		// llenarPerfilesSelected();
});



//llenar las comunas segun el municipio que seleccione
$( "#selFases" ).change(function() 
{
	
	fase = $( "#selFases" ).val();
	
	 if(fase != "")
	 {
		 if(fase == 1){fase=14; titulo="BITACORA FASE I"; descripcion=17; hallazgo=20;}
		 else if(fase == 2){fase = 15; titulo="BITACORA FASE II"; descripcion=18; hallazgo=21;}
		 else if(fase == 3){fase = 16; titulo="BITACORA FASE III"; descripcion=19; hallazgo=22;}
		$.get( "index.php?r=semilleros-tic-diario-de-campo-estudiantes/opciones-ejecucion-diario-campo&idFase="+fase+"&descripcion="+descripcion+"&hallazgo="+hallazgo,
				function( data )
					{			
						$("#titulo").html(titulo);
						$("#encabezado").html(data.html);
						$("#contenido").html(data.contenido);
						$('[for="semillerosticdiariodecampoestudiantes-descripcion"]').html(data.descripcion);
						$('[for="semillerosticdiariodecampoestudiantes-hallazgos"]').html(data.hallazgo);
						
															
					},
			"json");   
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



