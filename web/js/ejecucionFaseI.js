/**
Modificaciones:
Fecha: 2018-10-16
Descripción: Se premite insertar y modificar registros del formulario Ejecucion Fase I Docentes
---------------------------------------
*/

$( document ).ready(function(){
	
	//Copio los titulos y los dejo como arrary para que se más fácil usarlos en los popups
	var arrayTitles = [
		"Nombre del docente",
		"Nombre de las asignaturas que enseña",
		"Especialidad de la Media Técnica o Técnica",
		"Participación Sesiones(1 a 6)",
		"Número de Apps 0.0 creadas",
		"Nombre de las aplicaciones creadas",
		"Número de sesiones empleadas para la creación de cada aplicación",
		"Acciones realizadas con mayor incidencia para estimular la creación de las App 0.0",
		"Temas problema que atiende la cración",
		"Tipo de competencias inferencias y comprometidas en el proceso de creación de la App 0.0",
		"Observaciones",
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
	
	//Creo un array con las primeras posiciones de cada sesion
	//Esto se hace para que al hacer submit no aparezcan los datos vacios
	dvsFilas = [];
	$(".panel-body").each(function(x){
		
		dvsFilas[ $( "[id^=dvFilaSesion]", this ).eq(0)[0].id.substr( "dvFilaSesion".length ) ] = $( "[id^=dvFilaSesion]", this ).eq(0);
		$( "[id^=dvFilaSesion]", this ).eq(0).remove();
	});
	
	
	
	/************************************************************************************************************************************************
	 * 
	 ************************************************************************************************************************************************/
	 setTimeout(function(){

		
		 
		$( "input:text[id^=datossesiones]" ).each(function(x){
			
			$('#w0').yiiActiveForm('find', this.id ).validate = function (attribute, value, messages, deferred, $form) {
				
				var cmp = $( "#"+this.id ).val();
				
				var hayCamposVacios = false;
				$( "textarea[id^=ejecucionfase]", $( this.container ).parent() ).each(function(){
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
	
	consecutivos = [];
	$( '[id^=dvSesion]' ).each(function(x){
		
		var pos = this.id.substr( "dvSesion".length );
		
		consecutivos[pos] = {
			inicial : $( "[id^=dvFilaSesion]", this ).length+1,
			actual  : $( "[id^=dvFilaSesion]", this ).length+1,
		} 
	});
	
	$( "[id^=btnAddFila]" ).each(function(){
		
		$( this ).click(function(){
			
			var id = this.id.substr( "btnAddFila".length );
			
			var consecutivo = consecutivos[id].actual;
			
			// var filaNueva = $( "#dvFilaSesion"+id ).clone();
			var filaNueva = dvsFilas[id].clone();
			
			$( "#dvSesion"+id ).append( filaNueva );
			
			//Cambiando los id de los textarea con el consecutivo correspondiente
			$( "textarea,input:hidden", filaNueva ).each(function(x){
				$( this ).prop({
					id	: this.id.substr( 0, this.id.indexOf( '-', "ejecucionfase-".length )+1 )+consecutivo+this.id.substr( this.id.lastIndexOf( "-" ) ),
					name: this.name.substr( 0, this.name.indexOf( '[', "ejecucionfase-".length )+1 )+consecutivo+this.name.substr( this.name.lastIndexOf( "[" )-1 ),
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
						// title: 'Ingrese la informoción',
						title: arrayTitles[x],
						rows: 10,
						emptytext: '',
					});
			});
			
			// consecutivo++;
			consecutivos[id].actual++;
			
			$( "#btnRemoveFila"+id ).css({ display: "" });
		});
		
	});
	
	$( "[id^=btnRemoveFila]" ).each(function(){
		
		$( this ).click(function(){
			
			var id = this.id.substr( "btnRemoveFila".length );
			var total = $( "[id^=dvFilaSesion]", $( this ).parent().parent() ).length;
			
			var consecutivo = consecutivos[id].inicial;
			
			if( total > 0 ){
				
				if( total == consecutivo ){
					$( this ).css({ display: "none" });
				}
				
				$( "[id^=dvFilaSesion]", $( this ).parent().parent() ).last().remove();
			}
		});
	});
	
});
