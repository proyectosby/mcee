/**********
Versión: 001
Fecha: 2018-08-21
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE II
---------------------------------------
Modificaciones:
Fecha: 2018-09-18
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin Textarea, para poderlos editar
---------------------------------------
**********/


$( document ).ready(function(){
	
	//Copio los titulos y los dejo como arrary para que se más fácil usarlos en los popups
	var arrayTitles = [
		"Nombre de docentes participantes",
		"Nombre de las asignaturas que enseña",
		"Especialidad de la Media Técnica o Técnica",
		"Número de Apps 0.0 desarrolladas e implementadas",
		"Nombre de las aplicaciones desarrolladas",
		"Nombre de las aplicaciones creadas",
		"Número",
		"Tipo de obras",
		"Indice de temas escolares disciplinares abordados a través de las App 0.0",
		"Numero de pruebas realizadas a la aplicación",
		"Número de disecciones realizadas a la aplicación",
		"OBSERVACIONES GENERALES",
	];
	
	//Copio los titulos y los dejo como arrary para que se más fácil usarlos en los popups
	var arrayTitles2 = [
		"Tipo de Acción",
		"Descripción",
		"Responsable de la ejecución de la Acción",
		"Tiempo de desarrollo de las aplicaciones (Horas reloj)",
	];
	
	//Copio los titulos y los dejo como arrary para que se más fácil usarlos en los popups
	var arrayTitles3 = [
		"TIC (infraestructura existente en la IEO)",
		"Tipo de Uso del Recurso",
		"Digitales",
		"Tipo de Uso del Recurso",
		"Escolares (No TIC)",
		"Tipo de Uso del Recurso",
		"Tiempo de uso de los recursos TIC en el diseño de las App 0.0 (Horas reloj)",
	];
	
	
	//Copio los titulos y los dejo como arrary para que se más fácil usarlos en los popups
	var arrayTitlesCondicionesInstitucionales = [
		"Por parte de la IEO",
		"Por parte de UNIVALLE",
		"Por parte de la SEM",
		"OTRO",
		"Número de Sesiones por docentes participante",
		"Total sesiones por IEO",
		"Total Docentes participantes por IEO",
	];
	
	
	//Cuando se abre un acordeon se ponen todos los elementos del encabezado del mismo tamaño
	$('#collapseOne').on('shown.bs.collapse', function(){
		
		//this para este caso es el panel al que se dió click
		$( ".title, .title2, .title3", this ).each(function(){
			
			//Para este caso this es el div con clase .title
			var alto = $( this ).prop("scrollHeight");
			
			//pongo el span del tamaño requerido
			$( "span", this ).each(function(){
				//this es el span
				$( this ).css({ height: alto });
			});
		});
		
	});
	
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
	
	//Se agrega editables para los campos textarea de condiciones institucionales
	$( ".row-data-2" ).each(function(){
		
		$( "textarea", this ).each(function(x){
	
			$( this )
				.attr({readOnly: true })
				.css({resize: 'none' })
				.editable({
					// title: 'Ingrese la informoción',
					title: arrayTitles2[x],
					rows: 10,
					emptytext: '',
				});
		})
	});
	
	//Se agrega editables para los campos textarea de condiciones institucionales
	$( ".row-data-3" ).each(function(){
	
		$( "textarea", this ).each(function(x){
			$( this )
				.attr({readOnly: true })
				.css({resize: 'none' })
				.editable({
					// title: 'Ingrese la informoción',
					title: arrayTitles3[x],
					rows: 10,
					emptytext: '',
				});
		});
	});
	
	$( "[id^=btnAddFila]" ).each(function(){
		
		$( this ).click(function(){
			
			var id = this.id.substr( "btnAddFila".length );
			
			
			var filaNueva = $( "#dvFilaSesion"+id ).clone();
			$( "#dvSesion"+id ).append( filaNueva );
			
			
			filaNueva.css({ display: '' });
			$( "textarea", filaNueva ).each(function(x){
		
				$( this )
					.attr({
						readOnly: true,
						class: 'form-control',
					})
					.css({ resize: 'none' })
					.editable({
						title: 'Ingrese la informoción',
						title: arrayTitles[x],
						rows: 10,
						emptytext: '',
					});
			});
			
			$( "#btnRemoveFila"+id ).css({ display: "" });
		});
		
	});
	
	$( "[id^=btnRemoveFila]" ).each(function(){
		
		$( this ).click(function(){
			
			var id = this.id.substr( "btnRemoveFila".length );
			var total = $( "[id^=dvFilaSesion"+id+"]"  ).length;
			
			if( total > 1 ){
				
				if( total == 2 ){
					$( this ).css({ display: "none" });
				}
				
				$( "[id=dvFilaSesion"+id+"]" ).last().remove()
				
			}
		});
	});
	
});