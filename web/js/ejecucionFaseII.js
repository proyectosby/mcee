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
	
	$( "#collapseOne textarea" ).each(function(x){
	
		$( this )
			.attr({readOnly: true })
			.css({resize: 'none' })
			.editable({
				title: 'Ingrese la informoción',
				title: arrayTitles[x%arrayTitles.length],
				rows: 10,
				emptytext: '',
			});
	});
	
	$( "#condiciones-institucionales textarea" ).each(function(x){
	
		$( this )
			.attr({readOnly: true })
			.css({resize: 'none' })
			.editable({
				title: 'Ingrese la informoción',
				title: arrayTitlesCondicionesInstitucionales[x],
				rows: 10,
				emptytext: '',
			});
	});
	
	//Creo un array con las primeras posiciones de cada sesion
	//Esto se hace para que al hacer submit no aparezcan los datos vacios
	//Y se pueda clonar más fácil las filas
	dvsFilas = [];
	$(".panel-body").each(function(x){
		
		var id = $( "[id^=dvFilaSesion]", this ).eq(0)[0].id.substr( "dvFilaSesion".length );
		
		dvsFilas[id] = $( "[id^=dvFilaSesion]", this ).eq(0);
		$( "[id^=dvFilaSesion]", this ).eq(0).remove();
	});
	
	
	consecutivos = [];
	$( '[id^=dvSesion]' ).each(function(x){
		
		var pos = this.id.substr( "dvSesion".length );
		
		consecutivos[pos] = {
			inicial : $( "[id^=dvFilaSesion]", this ).length+1,
			actual  : $( "[id^=dvFilaSesion]", this ).length+1,
		} 
	});
	
	/************************************************************************************************************************************************
	 * Validando datos extras
	 ************************************************************************************************************************************************/
	 setTimeout(function(){
		 
		$( "input:text[id^=datossesiones]" ).each(function(x){
			
			$('#w0').yiiActiveForm('find', this.id ).validate = function (attribute, value, messages, deferred, $form) {
				
				var cmp = $( "#"+this.id ).val();
				
				//Valido que todos los campos esten llenos
				var sinCampoVacios = true;
				var hayCamposDiligenciados = false;
				$( "textarea[id^=semillerosticaccionesrecursosfaseii]", $( this.container ).parent() ).each(function(){
					if( $( this ).val() == '' ){
						sinCampoVacios = false;
					}
					else{
						hayCamposDiligenciados = true;
					}
				})
				
				$( "textarea[id^=semillerosticejecucionfaseii]", $( this.container ).parent() ).each(function(){
					if( $( this ).val() == '' ){
						sinCampoVacios = false;
					}
					else{
						hayCamposDiligenciados = true;
					}
				});
				
				//Si no se ha ingresado fecha y mas de una fila (ejecucion de fase)
				if( cmp == "" && $( "[id^=dvFilaSesion]", $( this.container ).parent() ).length == 0 && !hayCamposDiligenciados ){
					return true;
				}
				else if( cmp != "" && $( "[id^=dvFilaSesion]", $( this.container ).parent() ).length > 0 && sinCampoVacios ){
					return true;
				}
				else{
					if( cmp == "" )
						yii.validation.required(cmp, messages, {"message":"Fecha de la Sesión no puede ser vacío"});
					else if( hayCamposDiligenciados )
						yii.validation.addMessage(messages,"Debe agregar por lo menos una ejecución de fase y diligenciar todos los campos", cmp );
					else
						yii.validation.addMessage(messages,"Debe agregar por lo menos una ejecución de fase y diligenciar todos los campos", cmp );
					 
					return false;
				}
			}
		});
	 }, 500 );
	
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
			
			
			// var filaNueva = $( "#dvFilaSesion"+id ).clone();
			var filaNueva = dvsFilas[id].clone();
			$( "#dvSesion"+id ).append( filaNueva );
			
			
			var consecutivo = consecutivos[id].actual;
			
			//Cambiando los id de los textarea con el consecutivo correspondiente
			$( "textarea,input:hidden", filaNueva ).each(function(x){
				$( this ).prop({
					id	: this.id.substr( 0, this.id.indexOf( '-', "semillerosticejecucionfaseii-".length )+1 )+consecutivo+this.id.substr( this.id.lastIndexOf( "-" ) ),
					name: this.name.substr( 0, this.name.indexOf( '[', "semillerosticejecucionfaseii-".length )+1 )+consecutivo+this.name.substr( this.name.lastIndexOf( "[" )-1 ),
				})
			})
			
			
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
			
			consecutivos[id].actual++;
		});
		
	});
	
	$( "[id^=btnRemoveFila]" ).each(function(){
		
		$( this ).click(function(){
			
			var id = this.id.substr( "btnRemoveFila".length );
			var total = $( "[id^=dvFilaSesion]", $( this ).parent().parent() ).length;

			if( total > 0 ){
				
				if( total == 1 ){
					$( this ).css({ display: "none" });
				}
				
				$( "[id^=dvFilaSesion]", $( this ).parent().parent() ).last().remove()
				
			}
		});
	});
	
});