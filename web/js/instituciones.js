$(function ()
{
	//Click del boton agregar y cargar contenido del formulario agregar en el modal
	$("#modalButton").click(function()
	{
		$("#modal").modal('show')
		.find("#modalContent")
		.load($(this).attr('value'));
	});
	
	$("[name='detalle'],[name='actualizar']").click(function(e)
	{
		e.preventDefault() 
		$("#modal").modal('show')
		.find("#modalContent")
		.load($(this).attr('value'));
	});

});
