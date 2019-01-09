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
    //que institucion selecciono
    const {value: institucion} = swal({

        closeOnConfirm: false,
        closeOnCancel: false,
        allowOutsideClick: false,
        title: 'Seleccione una Institución',
        input: 'select',
        inputOptions: { $datos
        },
        inputPlaceholder: 'Seleccione...',
        inputValidator: (value) => {
            return new Promise((resolve) => {
                if (value !== '')
                {

                    //crear variable de session que tenga la institucion que seleciono
                    var Institucion = $.get( "index.php?instituciones="+value, function(data)
                    {
                        $("#InstitucionSede").html(" ");

                        $("#InstitucionSede").append(data.replace('"', ' ').replace('"', ' '));
                        console.log(data.charAt(0));
                    })

                    return fetch('index.php?r=sedes/sedes&idInstitucion='+value)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            (prueba) = response.json();

                            const {valor: sede} = swal({
                                closeOnConfirm: false,
                                closeOnCancel: false,
                                allowOutsideClick: false,
                                title: 'Seleccione una sede',
                                input: 'select',
                                inputOptions: (prueba),
                                inputPlaceholder: 'Seleccione una sede',

                                inputValidator: (valor) => {
                                    return new Promise((resolve) => {
                                        if (valor !== '') {
                                            dataSede = {
                                                id: valor
                                            };
                                            console.log('ok');
                                            //variable de sesion con la sede que selecciono
                                            $.post("index.php?r=sedes/set-sede", dataSede, function (data) {
                                                $('#nameSede').text(data);
                                            });
                                            location.href = location.pathname
                                            resolve()
                                        }
                                        else {
                                            resolve('Debe seleccionar una sede')
                                        }
                                    })
                                }
                            })
                        })
                    resolve();

                }
                else
                {
                    resolve('Debe seleccionar una institucion')
                }
            })
        }
    })
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
		  inputPlaceholder: 'Ninguna Sede',
		  allowEscapeKey: false,
		  allowOutsideClick: false,
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