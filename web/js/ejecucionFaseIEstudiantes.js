$( document ).ready(function(){
	
	//Copio los titulos y los dejo como arrary para que se más fácil usarlos en los popups
	var arrayTitles = [
		"Participación Sesiones (1 a 6)",
		"Número de estudiantes participantes",
		"Número de Apps 0.0 creadas",
		"Nombre de las aplicaciones creadas",
		"Número de sesiones empleadas para la creación de cada aplicación",
		"Acciones realizadas con mayor incidencia para estimular la creación de las App 0.0",
		"Temas problema que atiende la creación",
		"Tipo de competencias inferidas y comprometidas en el proceso de creación de App 0.0",
		"OBSERVACIONES GENERALES",
	];
	
	//Copio los titulos y los dejo como arrary para que se más fácil usarlos en los popups
	var arrayTitlesCondicionesInstitucionales = [
		"Por parte de la IEO",
		"Por parte de UNIVALLE",
		"Por parte de la SEM",
		"OTRO",
		"Número de Sesiones participantes por curso",
		"Número de estudiantes participantes por curso (Promedio)",
		"Total sesiones por IEO",
		"Total estudiantes IEO (Promedio)",
	];
	
	//this para este caso es el panel al que se dió click
	$( ".title" ).each(function(x){
		
		//Para este caso this es el div con clase .title
		var alto = $( this ).prop("scrollHeight");
		
		//pongo el span del tamaño requerido
		$( "span", this ).each(function(){
			
			//this es el span
			$( this ).css({ height: alto });
		});
	});
	
	//Cuando se abre un acordeon se ponen todos los elementos del encabezado del mismo tamaño
	$('#collapseOne').on('shown.bs.collapse', function(){
		
		//this para este caso es el panel al que se dió click
		$( ".title", this ).each(function(){
			
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
				title: 'Ingrese la informoción',
				title: arrayTitlesCondicionesInstitucionales[x],
				rows: 10,
				emptytext: '',
			});
	});
	
	//Se agrega editables para los campos textarea de condiciones institucionales
	$( "textarea[id^=semillerosticejecucionfaseiestudiantes]" ).each(function(x){
	
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
	
	
	
	/************************************************************************************************************************************************
	 * 
	 ************************************************************************************************************************************************/
	 setTimeout(function(){
		 
		$( "input:text[id^=datossesiones]" ).each(function(x){
			
			$('#w0').yiiActiveForm('find', this.id ).validate = function (attribute, value, messages, deferred, $form) {
				
				var cmp = $( "#"+this.id ).val();
				
				var hayCamposVacios = false;
				$( "textarea[id^=semillerosticejecucionfaseiestudiantes]", $( this.container ).parent() ).each(function(){
					if( $( this ).val() == '' ){
						hayCamposVacios = true;
					}
				});
				
				
				//Si no se ha ingresado fecha y mas de una fila (ejecucion de fase)
				if( cmp == "" && $( "[id^=dvFilaSesion]", $( this.container ).parent() ).length == 0 ){
					// alert(1);
					return true;
				}
				else if( cmp != "" && $( "[id^=dvFilaSesion]", $( this.container ).parent() ).length > 0 && !hayCamposVacios ){
					// alert(1);
					return true;
				}
				else{
					// alert(2);
					if( cmp == "" )
						yii.validation.required(cmp, messages, {"message":"Fecha de la Sesión no puede estar vacío"});
					else
						yii.validation.addMessage(messages,"Debe agregar por lo menos una ejecución de fase y llenar todos los campos", cmp );
					 
					return false;
				}
			}
		});
	 }, 500 );
	
	
	/********************************************************************************
	 * Si el usuario cambia el profesional o el curso de los participantes
	 * se recarga la página con los nuevos datos y no se guarda nada
	 ********************************************************************************/
	$( "#semillerosticdatosieoprofesionalestudiantes-id_profesional_a,#semillerosticdatosieoprofesionalestudiantes-curso_participantes" ).change(function(){
		
		if( $( "#semillerosticdatosieoprofesionalestudiantes-id_profesional_a" ).val() != '' && $( "#semillerosticdatosieoprofesionalestudiantes-curso_participantes" ).val() != '' )
		{
			$( "#guardar" ).val(0)
			this.form.submit();
		}
	})
	
	
	$( "[id^=container]" ).each(function(){
		
		var _container = $( this );
		
		var sesion = $( _container ).attr( 'sesion' );
		
		var filaNueva = $( "#dvFilaSesion-"+sesion+"-0", _container );
		
		//remuevo la primera fila ya que solo se usa para poderla clonar despues
		//Y nada de esa fila se guarda
		filaNueva.remove();
		
		//No dejo borrar los datos ya guardados
		var min = $( "[id^=dvFilaSesion]", _container ).length;
		
		//Este sirve para cambiar los id de acuerdo al cosecutivo que tenga este
		var consecutivo = $( "[id^=dvFilaSesion]", _container ).length+1;
		
		/**
		 * Le doy funcionalidad a los botones de agregar
		 * Se hace un each de cada boton
		 */
		$( "#btnAddFila"+sesion ).each(function(){
			 
			//this es el boton agregar
			$( this ).click(function(){
				
				var filaClonada = filaNueva.clone();
				
				_container.append( filaClonada );
				
				$( "#btnRemoveFila"+sesion ).css({display:''});
				
				//A todos los texareas les pongo que sea editables
				$( "textarea", filaClonada ).each(function(x){
		
					//Agrego data-type textarea para que el popup editable salga como textarea
					//Sin esto mostraría un input para ingresar información
					$( this ).data( 'type', 'textarea' );
				
					$( this )
						.attr({readOnly: true })
						.css({ 
							resize: 'none',
							height: '34px',
						})
						.editable({
							title: arrayTitles[x],
							rows: 10,
							emptytext: '',
						});
				});
				
				//Cambiando los id
				//A todos los texareas, input y select que tenga la fila clonada
				$( "textarea,input", filaClonada ).each(function(){
		
					//this es el respectivo textarea
					var _campo = this;
					
					$( _campo ).prop({
						id		: _campo.id.replace( /-[0-9]+-[0-9]+-/gi, "-"+sesion+"-"+consecutivo+"-" ),
						name	: _campo.name.replace( /\[[0-9]+\]\[[0-9]+\]/gi, "["+sesion+"]["+consecutivo+"]" ),
					});
					
					$( _campo ).parent()
						.removeClass( "field-"+this.id.replace( /-[0-9]+-[0-9]+-/gi, "-"+sesion+"-0-" ) )
						.addClass( "field-"+this.id );
					
					//Si el campo es diferente a id se valida qué este lleno, caso contrario no se obliga
					if( _campo.id.substr( -2 ) != 'id' )
					{
						$( "#w0" ).yiiActiveForm( 'add', 
								{
									"id"		: _campo.id,
									"name"		: _campo.name,
									"container"	: ".field-"+_campo.id,
									"input"		: "#"+_campo.id,
									"validate"	: function (attribute, value, messages, deferred, $form) {
													yii.validation.required(value, messages, {"message":"No puede estar vacío"});
												}
								},
							);
					}
					else
					{
						$( "#w0" ).yiiActiveForm( 'add', 
								{
									"id"		: _campo.id,
									"name"		: _campo.name,
									"container"	: ".field-"+_campo.id,
									"input"		: "#"+_campo.id,
									"validate"	: function (attribute, value, messages, deferred, $form) {
													return true;
												}
								},
							);
					}		
				});
				
				consecutivo++;
			});
		});
		
		/**
		 * Le doy funcionalidad a los botones de eliminar
		 * Se hace un each de cada boton
		 */
		$( "#btnRemoveFila"+sesion ).each(function(){
			 
			//this es el boton agregar
			$( this ).click(function(){
				
				if( $( "[id^=dvFilaSesion]", _container ).length == min+1 ){
					$( this ).css({display:'none'});
				}
				
				$( "[id^=dvFilaSesion]", _container ).last().remove();
			});
		});
	});
	
});