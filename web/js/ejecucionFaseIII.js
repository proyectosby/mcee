$( document ).ready(function(){
	
	var con = 2;
	
	$( "[id^=btnAddFila]" ).each(function(){
		
		$( this ).click(function(){
			
			console.log( con );	
			
			var id = this.id.substr( "btnAddFila".length );
			
			var cloneCollapse = $( ".panel" ).first().clone();
			
			var anchorA = $( ".panel-title > a" , cloneCollapse );
			
			anchorA
				.html( "Registro "+con )
				.attr( "href", anchorA.attr("href").substr( 0 , anchorA.attr("href").length-1 )+con );
			
			var panelCollapse = $( ".panel-collapse" , cloneCollapse );
			panelCollapse.attr( "id", panelCollapse.attr( "id" ).substr( 0, panelCollapse.attr( "id" ).length-1 )+con )
			
			$( ".panel-group" ).append( cloneCollapse );
			
			$( "#btnRemoveFila"+id ).css({ display: "" });
			
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