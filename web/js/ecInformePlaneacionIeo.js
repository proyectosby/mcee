$( document ).ready(function(){
	
	
swal({
  title: '<strong>HTML <u>example</u></strong>',
  type: 'info',
  html:
    'Cuál es el estado general de avance de los procesos de gestión de los Proyectos Pedagógicos Transversales <br>'+
	'<progress max="100" value="80" ></progress> 80%',
	
  focusConfirm: false,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Gracias!',
  confirmButtonAriaLabel: 'Thumbs up, great!',
  cancelButtonText:
    '<i class="fa fa-thumbs-down"></i>',
  cancelButtonAriaLabel: 'Thumbs down',
})
	
});