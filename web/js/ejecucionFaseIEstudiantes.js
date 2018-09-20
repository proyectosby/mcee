$( document ).ready(function(){
	
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
			
			var id = this.id.substr( "btnAddFila".length );
			
			var filaNueva = $( "#dvFilaSesion"+id ).clone();
			
			$( "#dvSesion"+id ).append( filaNueva );
			
			$( "#btnRemoveFila"+id ).css({ display: "" });
			
			//La fila que se clona siempre está oculta, por tal motivo la muestro
			$( filaNueva ).css({display:''});
			
			//Pongo todos los textarea del item del acordeon clonado para que se siempre editable
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