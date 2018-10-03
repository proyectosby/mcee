/**********
---------------------------------------
Modificaciones:
Fecha: 17-09-2018
Persona encargada: Oscar David Lopez Villa
Cambios realizados: Se habilita el swal para cambio de sede
---------------------------------------
**********/


$( document ).ready(function() 
{
	 
	
});


//extraer el valor de institucion seleccionada de las cookies
function readCookie(name) {

  return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + name.replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;

}



$( "#cambiarSede" ).click(function() 
{
	
	institucionJS = readCookie( "institucionJs" );
		return fetch('index.php?r=sedes/sedes&idInstitucion='+institucionJS)
			  .then(response => {
				if (!response.ok) {
				  throw new Error(response.statusText)
				}
				(prueba) =   response.json()
		
		
		//que institucion selecciono
		const {value: institucion} = swal({
		  title: 'Seleccione una Sede',
		  input: 'select',
		  inputOptions: (prueba),
		  inputPlaceholder: 'Seleccione...',
		  inputValidator: (value) => {
			return new Promise((resolve) => {
			  if (value !== '') 
			  {  
		   
				  //crear variable de session que tenga la institucion que seleciono
				 var Institucion = $.get( "index.php?sede="+value, function() 
					{
						
					resolve(window.location.reload(true));
					})
					  

			  }
			  else 
			  {
				   var sede = $.get( "index.php?sede=-1", function() 
					{
						
					})
					resolve(window.location.reload(true));
					

			  }
			})
		  }
		})
	 })
});