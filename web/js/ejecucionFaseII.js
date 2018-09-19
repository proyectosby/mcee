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
	
	$( "[id^=btnAddFila]" ).each(function(){
		
		$( this ).click(function(){
			
			var id = this.id.substr( "btnAddFila".length );
			
			
			var filaNueva = $( "#dvFilaSesion"+id ).clone();
			$( "#dvSesion"+id ).append( filaNueva );
			
			
			filaNueva.css({ display: '' });
			$( "textarea", filaNueva ).each(function(){
		
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