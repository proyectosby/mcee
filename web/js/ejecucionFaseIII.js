/**********
Versión: 001
Fecha: 2018-08-21
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE III
---------------------------------------
Modificaciones:
Fecha: 2018-09-18
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin Textarea, para poderlos editar
---------------------------------------
**********/

$( document ).ready(function(){
	
	var con = 2;
	
	//Copio los titulos y los dejo como arrary para que se más fácil usarlos en los popups
	var arrayTitles = [
		"Nombre del docente creador",
		"Asignatura en la que se usa la aplicaión",
		"Nombre del docente usuario de la Aplicación",
		"Grado en el que se usa la aplicación",
		"Número de estudiantes cultivadores",
		"Número de Apps 0.0 usadas",
		"Nombre de las aplicaciones usadas",
		"TIC (infraestructura existente en la IEO)",
		"Tipo de Uso del Recurso",
		"Digitales",
		"Tipo de Uso del Recurso",
		"Escolares (No TIC)",
		"Tipo de Uso del Recurso",
		"Tiempo de uso de los recursos TIC en el uso de las App 0.0 (Horas)",
		"Número",
		"Tipo de producción",
		"Indice de temas escolares disciplinares tratados y abordados a través del uso de las App 0.0",
		"Indice de problematicas abordadas a través del uso de las App 0.0",
		"Fecha de Uso de las aplicaciones",
		"OBSERVACIONES GENERALES",
	];
	
	
	//Copio los titulos y los dejo como arrary para que se más fácil usarlos en los popups
	var arrayTitlesCondicionesInstitucionales = [
		"Por parte de la IEO",
		"Por parte de UNIVALLE",
		"Por parte de la SEM",
		"OTRO",
	];
	
	//Cuando se abre un acordeon se ponen todos los elementos del encabezado del mismo tamaño
	$('#collapseOne').on('shown.bs.collapse', function(){
		
		//this para este caso es el panel al que se dió click
		$( ".title, .title3, .title2", this ).each(function(){
			
			//Para este caso this es el div con clase .title
			var alto = $( this ).prop("scrollHeight");
			
			//pongo el span del tamaño requerido
			$( "span", this ).each(function(){
				//this es el span
				$( this ).css({ height: alto });
			});
		});
		
	});
	
	//Oculto el primer acordeon para que no se vea
	//Esto se hace por que si clona sobre algo que ya tiene textareas editables aparecen comportamientos insesperados
	//Por tal motivo se mantiene el primer item del acordeon oculto
	$( ".panel" ).first().css({display:'none'});
	
	//Se agrega editables para los campos textarea de condiciones institucionales
	$( "#condiciones-institucionales textarea" ).each(function(x){
	
		$( this )
			.attr({readOnly: true })
			.css({resize: 'none' })
			.editable({
				// title: 'Ingrese la informoción',
				title: arrayTitlesCondicionesInstitucionales[x],
				rows: 10,
				emptytext: '',
			});
	});
	
	$( "[id^=btnAddFila]" ).each(function(){
		
		$( this ).click(function(){
			
			console.log( con );	
			
			var id = this.id.substr( "btnAddFila".length );
			
			//Clono sobre el primer item del acordeon, que siempre está oculto
			var cloneCollapse = $( ".panel" ).first().clone();
			
			//Se muestra el item del acordeon
			cloneCollapse.css({ display: "" });	
			
			var anchorA = $( ".panel-title > a" , cloneCollapse );
			
			anchorA
				.html( "Registro "+con )
				.attr( "href", anchorA.attr("href").substr( 0 , anchorA.attr("href").length-1 )+con );
			
			var panelCollapse = $( ".panel-collapse" , cloneCollapse );
			panelCollapse.attr( "id", panelCollapse.attr( "id" ).substr( 0, panelCollapse.attr( "id" ).length-1 )+con )
			
			$( ".panel-group" ).append( cloneCollapse );
			
			$( "#btnRemoveFila"+id ).css({ display: "" });
			
			//Pongo todos los textarea del item del acordeon clonado para que se siempre editable
			$( "textarea", cloneCollapse ).each(function(x){
		
				$( this )
					.attr({
						readOnly: true,
						class: 'form-control',
					})
					.css({ resize: 'none' })
					.editable({
						// title: 'Ingrese la informoción',
						title: arrayTitles[x],
						rows: 10,
						emptytext: '',
					});
			});
			
			con++;
		});
		
	});
	
	$( "[id^=btnRemoveFila]" ).each(function(){
		
		$( this ).click(function(){
			
			var total = $( ".panel" ).length;
			
			if( total > 1 ){
				
				if( total == 2 ){
					$( this ).css({ display: "none" });
				}
				
				$( ".panel" ).last().remove()
				
				con--;
				
				console.log( con );
				
			}
		});
	});
	
});