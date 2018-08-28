$( document ).ready(function(){
	
	$( "[id^=btnAddFila]" ).each(function(){
		
		$( this ).click(function(){
			
			var id = this.id.substr( "btnAddFila".length );
			$( "#dvSesion"+id ).append( $( "#dvFilaSesion"+id ).clone() );
			
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