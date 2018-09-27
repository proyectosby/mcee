/**********
Versión: 001
Fecha: 2018-08-28
Desarrollador: Edwin Molina Grisales
Descripción: Formulario SEMILLEROS DATOS IEO ESTUDIANTES
---------------------------------------
Modificaciones:
Fecha: 2018-09-19
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin XEditable, para poderlos editar
---------------------------------------
**********/

$( document ).ready(function(){
	
	//Se agrega editables para los campos textarea de condiciones institucionales
	$( "textarea" ).each(function(){
		
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
				title: 'Ingrese la informoción',
				rows: 10,
				emptytext: '',
			});
	});
	
});