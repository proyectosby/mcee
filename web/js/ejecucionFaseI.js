$( document ).ready(function(){
	
	// $( "[id^=dvSesion] textarea" ).each(function(){
	
		// $( this )
			// .attr({readOnly: true })
			// .css({resize: 'none' })
			// .editable({
				// title: 'Ingrese la informoción',
				// rows: 10,
			// });
	// });
	
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