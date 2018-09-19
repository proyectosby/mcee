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
	
	//Oculto el primer acordeon para que no se vea
	//Esto se hace por que si clona sobre algo que ya tiene textareas editables aparecen comportamientos insesperados
	//Por tal motivo se mantiene el primer item del acordeon oculto
	$( ".panel" ).first().css({display:'none'});
	
	//Se agrega editables para los campos textarea de condiciones institucionales
	$( "#condiciones-institucionales textarea" ).each(function(){
	
		$( this )
			.attr({readOnly: true })
			.css({resize: 'none' })
			.editable({
				title: 'Ingrese la informoción',
				rows: 10,
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
			$( "textarea", cloneCollapse ).each(function(){
		
				$( this )
					.attr({
						readOnly: true,
						class: 'form-control',
					})
					.css({ resize: 'none' })
					.editable({
						title: 'Ingrese la informoción',
						rows: 10,
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