

function init(){
    //Para validación
	$('#nombre').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	$('#apellidop').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	$('#telef_usuario').validacion('0123456789');
    
	$('#login').validacion(' abcdefghijklmnñopqrstuvwxyz0123456789');
    $('#clave').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú0123456789');
	
	mostrarform(false);
    listar();
    $("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
}

//Función limpiar
function limpiar()
{
	$("#nombre_usuario").val("");
	$("#id_usuario").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		
		$('#edit_usuario').modal('show');
		
	}
	else
	{
		$('#edit_usuario').modal('hide');
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

function listar(){
    tabla=$('#data-table').DataTable(
        {
            "lengthMenu": [10, 25, 50],//mostramos el menú de registros a revisar
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfltip',//Definimos los elementos del control de tabla
            
            "ajax":
                    {
                        url: '../ajax/usuario.php?op=0',
                        type : "get",
                        dataType : "json",						
                        error: function(e){
                            console.log(e.responseText);	
                        }
                    }
        });
}

//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/usuario.php?op=1",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {    
			mensaje=datos.split(":");
			if(mensaje[0]=="1"){               
			swal.fire(
				'Mensaje de Confirmación',
				mensaje[1],
				'success'

				);           
	          mostrarform(false);
	          tabla.ajax.reload();
			}
			else{
				Swal.fire({
					type: 'error',
					title: 'Error',
					text: mensaje[1],
					footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
				});
			}
	    }

	});
	limpiar();
}

function mostrar(id_usuario)
{
	$.post("../ajax/usuario.php?op=4",{id_usuario : id_usuario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre_usuario").val(data.nombre_usuario);
 		$("#id_usuario").val(data.id_usuario);
		$("#apellidop_usuario").val(data.apellidop_usuario);
		$("#telef_usuario").val(data.telef_usuario);
		$("#login_usuario").val(data.login_usuario);
 	});
}

//Función para desactivar registros
function desactivar(id_usuario)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea desactivar el Registro?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Desactivar'
	}).then((result) => {
		if (result.value) {
			$.post("../ajax/usuario.php?op=2", {id_usuario : id_usuario}, function(e){
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
					}	
					else{
						Swal.fire({
							type: 'error',
							title: 'Error',
							text: mensaje[1],
							footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
						});
					}			
        	});	
		}
	});   
}

//Función para activar registros
function activar(id_usuario)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea activar el Registro?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Activar'
	}).then((result) => {
		if (result.value) {
			$.post("../ajax/usuario.php?op=3", {id_usuario : id_usuario}, function(e){
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
					}	
					else{
						Swal.fire({
							type: 'error',
							title: 'Error',
							text: mensaje[1],
							footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
						});
					}			
        	});	
		}
	}); 
}

init();