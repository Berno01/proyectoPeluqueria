var tabla;

//Función que se ejecuta al inicio
function init(){

	/*Para validación
	$('#nombre').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	$('#apellidop').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	$('#apellidom').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	$('#num_documento').validacion(' abcdefghijklmnñopqrstuvwxyz-0123456789');
	$('#direccion').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú,.#º0123456789');
    $('#tipo_documento').select2();
	$('#login').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú0123456789/-*,.°()$#');
    $('#clave').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú0123456789/-*,.°()$#');
	$('#rol').select2();*/

	mostrarform(false);
	//listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});

}

//Función limpiar
function limpiar()
{
	$("#nombre_usuario").val("");
	$("#apellidop_usuario").val("");
	$("#login_usuario").val("");
	$("#clave_usuario").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	window.location.href = 'escritorio.php';
}

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
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
			if(mensaje[0].slice(-1) =="1"){               
			swal.fire(
				'Mensaje de Confirmación',
				mensaje[1],
				'success'

				);           
	          mostrarform(false);
	          setTimeout(function() {
    window.location.href = 'escritorio.php';
}, 2000);
			}
			else{
				Swal.fire({
					type: 'error',
					title: 'Error',
					text: mensaje[1],
					footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
				});
				console.log(mensaje);
			}
	    }

	});
	limpiar();
}
/*
function mostrar(idusuario)
{
	$.post("../ajax/usuario.php?op=4",{idusuario : idusuario}, function(data, status)
	{
		
		data = JSON.parse(data);		
		mostrarform(true);
        
		$("#nombre").val(data.nombre_persona);
		$("#apellidop").val(data.ap_persona);
		$("#apellidom").val(data.am_persona);
		$("#tipo_documento").val(data.tipo_documento_persona);
		$('#categoria').trigger('change.select2');
		$("#num_documento").val(data.num_documento_persona);
		$("#direccion").val(data.direccion_persona);
		$("#email").val(data.email_persona);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../file/usuarios/"+data.imagen_persona);
		$("#imagenactual").val(data.imagen_persona);
		$("#idusuario").val(data.id_usuario);
		$("#login").val(data.nombre_usuario);

		$.post("../ajax/rol.php?op=5", function(r){
            $("#rol").html(r);
            $('select[name=rol]').val(data.id_rol);
            $('#rol').trigger('change.select2');
        });

        $.post("../ajax/usuario.php?op=6",{clave : data.clave_usuario}, function(r){
			$("#clave").val(r);
		});
 	});
}*/

/*Función para desactivar registros
function desactivar(idusuario)
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
			$.post("../ajax/usuario.php?op=2", {idusuario : idusuario}, function(e){
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
function activar(idusuario)
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
			$.post("../ajax/usuario.php?op=3", {idusuario : idusuario}, function(e){
                console.log(e);
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
}*/

init();