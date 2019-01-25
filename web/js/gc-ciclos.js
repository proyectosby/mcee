
	//Siempre hay un objeto semana y este se usa para replicar las demás semanas
	var objSemana = $( "#dv-semana-0" );
	objSemana.remove();

	/**
	 * funciones para agregar contenido de semanas
	 */
	$( ".btn-add-semanas" ).click(function(){
		
		/**
		 * clono la semana original y la agrego al div que contiene la información de todas 
		 * las semanas (dvSemanas)
		 */
		var clone = objSemana.clone();
		clone.appendTo( "#dvSemanas" );
		
		//Todos los inputs tipo text del clone son fechas
		$( "input:text", clone ).each(function(){
			
			//this se refiere al campo input
			
			//Se hace de acuerdo con parent por que originalmente lo hace así el yii por defecto para las fechas
			
			$( this ).parent().datepicker({
				autoclose	: true,
				format		: "yyyy-mm-dd",
				language	: "es",
			})
		})
	});

	$( ".btn-remove-semanas" ).click(function(){
		
		$( "[id^=dv-semana]" ).last().remove();
	});
