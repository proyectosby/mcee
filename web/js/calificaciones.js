/**********
Versión: 001
Fecha: 04-04-2018
---------------------------------------
Modificaciones:
Fecha: 04-04-2018
Persona encargada: Edwin Molina Grisales
Se muestra el código de los indicadores y se mejora la carga y mostrada de las notas
---------------------------------------
**********/

$( document ).ready(function() {
	// Handler for .ready() called.
	// $( "input" ).change(function(){
		
		
		// var tr = $( this ).parent().parent().parent();
		
		// var tds = $( "input:text", tr );
		// var sum = 0;
		
		// sum += tds.eq(0).val()*0.3;
		// sum += tds.eq(1).val()*0.4;
		// sum += tds.eq(2).val()*0.3;
		// sum = sum*0.7;
		// sum += tds.eq(3).val()*0.1;
		// sum += tds.eq(4).val()*0.1;
		// sum += tds.eq(5).val()*0.1;
		
		// $( tds[ 6 ] ).val( Math.round( 100*sum )/100 );
	// });
	
	llenarComboDocentes();
	
});


function notaFinal(obj)
{
	var tr = $( obj ).parent().parent().parent();
		
		var tds = $( "input:text", tr );
		var sum = 0;
		
		sum += tds.eq(0).val()*0.3;
		sum += tds.eq(1).val()*0.4;
		sum += tds.eq(2).val()*0.3;
		sum = sum*0.7;
		sum += tds.eq(3).val()*0.1;
		sum += tds.eq(4).val()*0.1;
		sum += tds.eq(5).val()*0.1;
		
		$( tds[ 6 ] ).val( Math.round( 100*sum )/100 );
}


function cargarCalificacionAEstudiantes( indicadoresDesempeno ){	

	var idDocente =	$( "#selDocentes" ).val();
	
	//Creo el array con los indicadores
	var indicadores = [ "saber", "hacer","ser","personal","social","ae" ];
	
	//Dejo todos los campos correspondientes en blanco
	
	//todos los campos en blanco
	$( "input[type='text']" ).val("");
	
	//Deja valores por defecto a los campos de notas
	$( indicadores ).each(function(){
		var name = this;
		$( "input[name="+name+"]" ).val('0');
		$( "input[name=id"+name+"]" ).val('');
	});
	
	//Las notas finales se dejan en 0.0
	$( "input[disabled]" ).val("0.0");
	
	
	$( indicadores ).each(function(x){
		
		//x es la posicion del array e indicadores de desempeno tiene el codigo a buscar
		idIndicadorDesempeno = indicadoresDesempeno[x].id;	
		
		//llenar indicadores desempeño
		var name = this; //this en este caso es idSaber, idHacer, ...
		
		$.get( "index.php?r=calificaciones/consultar-calificaciones&idDocente="+idDocente+"&idIndicadorDesempeno="+idIndicadorDesempeno, 
				function( data )
				{
					try{
						for( var x in data ){
							
							//Toda fila tienen como atributo estudiante
							var tr = $( "[estudiante="+data[x].estudiante+"]" );
							
							//Asigno la calificacion al campo corresponde
							
							$( "input[name="+name+"]", tr ).val( data[x].calificacion );
							// $( "input[name="+name+"]" ).change();
							//llenar la nota final 
							notaFinal( $( "input[name="+name+"]", tr ) );
							$( "input[name=id"+name+"]", tr ).val( data[x].id );
							
							//En la fila busco un campo que tenga como name idSaber, idHacer, etc
						}
					}
					catch(e){
						$( "input[name="+name+"]" ).val('0');
						$( "input[name=id"+name+"]" ).val('');
					}
				},
		"json");
		//borrar los valores de las cajas de texto al cambiar la materia
		// $( "input[type='text']" ).val("");
		
		// $( "input[name="+name+"]" ).val("");
		
	});
}

$( ".content a" ).click(function(){
	
	var nombreFormulario = $( ".content form" ).attr( "id"); 
	var idDocente = $( selDocentes ).val();
	 
	if( idDocente != '' ){
		
		var table = $( ".content table" ).eq( $( ".content table" ).length-1 );
		 
		var estudiantes = $( "tbody > tr", table );
		 
		//Obtenendo los codigos del desempño
		var codigosDesempeno = $( "thead > tr", table ).eq(3);
		var codigosDesempeno = $( "th", codigosDesempeno );

		data = [];
		 
		estudiantes.each(function(x){
			 
			var estudiante 		 = $( "[name=idPersona]", this ).val()*1;
			var inCalificaciones = $( "input:text:lt(6)", this );
			var inIds			 = $( "input:hidden:lt(7)", this );

			inCalificaciones.each(function(y){

				data.push({
					id										: $( inIds ).eq(y+1).val()*1,
					calificacion							: $( this ).val()*1,
					fecha									: "2018-03-21",
					observaciones							: "",
					id_perfiles_x_personas_docentes			: idDocente,
					id_perfiles_x_personas_estudiantes		: estudiante,
					id_distribuciones_x_indicador_desempeno	: codigosDesempeno.eq(y).data("id")*1,
					fecha_modificacion						: "2018-03-21",
					estado									: 1,
				});
			});
		});
		
		$.post(
			"index.php?r=calificaciones/create",
			{ 
				data: data 
			},
			function( data ){
				
				try{
					for( var x in data ){
						
						var trEstudiante = $( "[estudiante="+x+"]" );
						var inIds		 = $( "input:hidden:lt(7)", trEstudiante );
						
						$( data[x] ).each(function(y){
							inIds.eq(y+1).val( this.id );
						});
					}
					
					swal({
						text: "Califiaciones guardadas exitosamente",
						icon: "success",
						button: "Cerrar",
					});
				}
				catch(e){
					swal({
						text: "Hubo un error al guardar las calificaciones",
						icon: "warning",
						button: "Cerrar",
					});
				}
			},
			"json"
		);
	}
	
	return false;
});


//consulta los docentes 
function llenarComboDocentes()
{
	
	$.get( "index.php?r=calificaciones/listar-docentes", 
				function( data )
				{
					$("#selDocentes").html(data);
				},
		"json");
	
	
}

//inicio eventos 

//consulta los niveles(grados) que tiene asociado ese docente desde #selDocentes
$("#selDocentes").change(function()
{
	llenarComboGrados();
	llenarCommbosSedeJornadaPeriodo();
	
});

//consulta los grupo(paralelos) que tiene asociado ese docente en ese grado desde #selDocentes
$("#selGrado").change(function()
{
	llenarComboGrupo();
});

//consulta las materias que tiene asociado ese docente en ese grupo des #selGrado
$("#selGrupo").change(function()
{
	llenarComboMateria();
	llenarEstudiantes()
});

//Fin eventos 


//consulta los niveles(grados) que tiene asociado ese docente
function llenarComboGrados()
{
	
	idDocente=$("#selDocentes").val();
	//si el id esta vacio no hace nada
	if(idDocente == "")
	{
		//si docente tiene ningun nombre seleccionado se vacia el combo de grado y se pone ese html
		$("#selGrado").html("<option value=''>Seleccione...<\/option>");
		return false;
	}
	
	//consulta los niveles que tiene asociado ese docente
	$.get( "index.php?r=calificaciones/niveles-docente&idDocente="+idDocente, 
			function( data )
			{
				$("#selGrado").html(data);
			},
	"json");
		
}


//consulta los grupo(paralelos) que tiene asociado ese docente en ese grupo des #selGrado
function llenarComboGrupo()
{
	
	idDocente =	$("#selDocentes").val();
	idNivel   =	$("#selGrado").val();
	//si el idNivel esta vacio no hace nada
	if(idNivel == "")
	{
		//si grado tiene ningun nombre seleccionado se vacia el combo de grado y se pone ese html
		$("#selGrupo").html("<option value=''>Seleccione...<\/option>");
		return false;
	}
	
	//consulta los niveles que tiene asociado ese docente
	$.get( "index.php?r=calificaciones/grupo-niveles-docente&idDocente="+idDocente+"&idNivel="+idNivel, 
			function( data )
			{
				$("#selGrupo").html(data);
			},
	"json");
		
}



//consulta las materias que tiene asociado ese docente en ese grupo des #selGrado
function llenarComboMateria()
{
	
	idDocente =	$("#selDocentes").val();
	idParalelo   =	$("#selGrupo").val();
	//si el idNivel esta vacio no hace nada
	if(idParalelo == "")
	{
		//si grado tiene ningun nombre seleccionado se vacia el combo de grado y se pone ese html
		$("#selMateria").html("<option value=''>Seleccione...<\/option>");
		return false;
	}
	
	//consulta los niveles que tiene asociado ese docente
	$.get( "index.php?r=calificaciones/materia-grupo&idDocente="+idDocente+"&idParalelo="+idParalelo, 
			function( data )
			{
				$("#selMateria").html(data);
			},
	"json");	
	
	
}


function llenarCommbosSedeJornadaPeriodo()
{
	
	idDocente =	$("#selDocentes").val();
	//si el idNivel esta vacio no hace nada
	if(idDocente == "")
	{
		//si grado tiene ningun nombre seleccionado se vacia el combo de grado y se pone ese html
		$("#xxxxxxxxxxxxxx").html("<option value=''>Seleccione...<\/option>");
		return false;
	}
	
	//consulta los niveles que tiene asociado ese docente
	$.get( "index.php?r=calificaciones/sede-jornada-periodo&idDocente="+idDocente, 
			function( data )
			{
				$("#txtSede").val(data.nombreSede);
				$("#selJornada").html(data.jornadas);
				$("#selPeriodo").html(data.periodos);
			},
	"json");
		
}

/**
 * Funcion llenar los estudiante por paralelo
 * 
 * param Parámetro: id del paralelo
 * return Tipo de retorno: Los estudiantes que tiene el paralelo seleccionado
 * author : Oscar David Lopez villa
 * exception : No tiene excepciones.
 */
function llenarEstudiantes()
{
	
	idParalelo   =	$("#selGrupo").val();
	//si el idNivel esta vacio no hace nada
	if(idParalelo == "")
	{
		$("#estudiantes").html("");
		return false;
	}
	
	//consulta los estudiantes que tiene ese paralelo 
	$.get( "index.php?r=calificaciones/personas&idParalelo="+idParalelo, 
			function( data )
			{
				$("#estudiantes").html(data);
				
				$( "#estudiantes input:text.nota" ).on('keyup', function(e) {
					
					
					var tecla = e.keyCode || e.which;

					//Tecla de retroceso para borrar, siempre la permite
					if ( tecla==8 || tecla == 13 || tecla == 9 ){
						return true;
					}
					
					//Valida que no se pueda ingresar valor menores a 0 y mayores a 5
					
					var max		= 5;
					var min		= 0;
					var valor 	= parseFloat(this.value);
					
					if(valor < min || valor > 5 ){

						swal({
							text: "El Valor debe ser mayor a 0 y menor a 5",
							icon: "warning",
							button: "Cerrar",
						});
						
						if( valor > 5)
							this.value = max;
						
						if( valor < 0 )
							this.value = min;
					}

				}).keypress(function(e){
					
					//Solo se permite números decimales
					
					var tecla = e.keyCode || e.which;
					
					// Patron de entrada, en este caso solo acepta numeros
					var patron=  /^[0-9]*\.?[0-9]*$/
					tecla_final = String.fromCharCode(tecla);
					// return patron.test(tecla_final);
					return (patron.test(tecla_final) || tecla == 9 || tecla == 8);
				});
				
				//a faltas solo se le puede ingresar numeros enteros
				$( "#estudiantes input:text.falta" ).keypress(function(e){
					
					
					var tecla = e.keyCode || e.which;

					//Tecla de retroceso para borrar, siempre la permite
					if ( tecla==8 || tecla == 13 || tecla == 9 ){
						return true;
					}
						
					// Patron de entrada, en este caso solo acepta numeros
					var patron=  /^[0-9]+$/
					tecla_final = String.fromCharCode(tecla);
					return patron.test(tecla_final);
				});
			},
	"json");
		
}




/**
 * Funcion llenar los indicadores de desempeño
 * 
 * param Parámetro: El onchange del select id selMateria
 * return Tipo de retorno: Retorna los indicadores a calficar
 * author : Viviana Rodas
 * exception : No tiene excepciones.
 */
$("#selMateria").change(function(){ 

	idDocente =	$("#selDocentes").val();
	idParalelo = $("#selGrupo").val();
	idAsignatura = $("#selMateria").val();
	
	// Se deja en blanco los campo  requeridos cada vez que se cambie la materia
	$("#thSaber").html('').data( 'id', '' );
	$("#thHacer").html('').data( 'id', '' );
	$("#thSer").html('').data( 'id', '' );
	$("#thPers").html('').data( 'id', '' );
	$("#thSoci").html('').data( 'id', '' );
	$("#thAE").html('').data( 'id', '' );
	
	
	//llenar indicadores desempeño
	$.get( "index.php?r=calificaciones/listar-i&idDocente="+idDocente+"&idParalelo="+idParalelo+"&idAsignatura="+idAsignatura, 
				function( data )
				{
					//console.log(data);
					// se llenan los codigos de indicadores de desempeño
					$("#thSaber").html(data[0]['codigo']);
					$("#thHacer").html(data[1]['codigo']);
					$("#thSer").html(data[2]['codigo']);
					$("#thPers").html(data[3]['codigo']);
					$("#thSoci").html(data[4]['codigo']);
					$("#thAE").html(data[5]['codigo']);
					
					// se llenan los id de indicadores de desempeño en los campos hidden NO SE COMO LLENARLOS CON EL NAME
					// $("#thSaberId").html(data[0]['id']);
					// $("#thHacerId").html(data[1]['id']);
					// $("#thSerId").html(data[2]['id']);
					// $("#thPersId").html(data[3]['id']);
					// $("#thSociId").html(data[4]['id']);
					// $("#thAEId").html(data[5]['id']);
					
					/**
					 * uso caractarísticas de html
					 * cualquier campo puede tener el atributo data
					 * El atributo data siempre tiene la características data-DataAtributo
					 * Donde DataAtributo es cualquier descripcion que identifica lo que se necesita
					 *
					 * Ejemplo: <input type='text' data-caracteristica='T-14'>
					 *
					 * jquery permite un fácil manejo con la función .data
					 *
					 * A continuación se setea cada celda con el valor correspondiente
					 *
					 * Nota: Al momento de grabar se usa las función get de jquery para data
					 */
					$("#thSaber").data( "id", data[0]['id']);
					$("#thHacer").data( "id", data[1]['id']);
					$("#thSer").data( "id", data[2]['id']);
					$("#thPers").data( "id", data[3]['id']);
					$("#thSoci").data( "id", data[4]['id']);
					$("#thAE").data( "id", data[5]['id']);
					
					cargarCalificacionAEstudiantes( data );
				},
		"json");
});
