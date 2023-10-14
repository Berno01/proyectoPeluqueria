var myModal = new bootstrap.Modal(document.getElementById('myModal'))



document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'es',
      headerToolbar:{
        left: 'title',
        center: '',
        right: 'dayGridMonth, timeGridWeek'
      },
      dateClick: function (info){
        
        document.getElementById('start').value = info.dateStr;
        myModal.show();
      },
	  events: function(fetchInfo, successCallback, failureCallback) 
	  	{
			// Llamamos a la función que obtiene los eventos
			listar()
				.then(function(data) {
					successCallback(data);
				})
				.catch(function(error) {
					failureCallback(error);
				});
		},
		eventClick: function(event) 
		{
			console.log(event);
			console.log(event.event.start);
			mostrar(event);
		}
		
      

    });
    calendar.render();
  });


 


function init(){
    //Para validación
	
	listar();
	mostrarform(false);
	mostrarFormCorte(false);
	$("#imagenmuestra1").hide();
  $("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
}

//Función limpiar
function limpiar()
{
	$("#nombre_categoria").val("");
	$("#id_categoria").val("");
}

function limpiarCorte()
{
	$("#id_corte").val("");
	$("#fecha_corte").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		
		$('#exampleModalCenter').modal('show');
		
	}
	else
	{
		$('#exampleModalCenter').modal('hide');
	}
}

function mostrarFormCorte(flag)
{
	limpiarCorte();
	if (flag)
	{
		
		$('#modalCorte').modal('show');
		
	}
	else
	{
		$('#modalCorte').modal('hide');
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

function cancelarFormCorte(){
	limpiarCorte();
	mostrarFormCorte(false)
}


//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/cita.php?op=1",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {    
			
			mensaje=datos.split("_");
			if(mensaje[0]=="1"){               
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
			}
	    }

	});
	limpiar();
}




function listar(){
	return new Promise
	(function(resolve, reject) 
	{
		tabla=$.ajax({
			url: '../ajax/cita.php?op=0',
			type: 'GET',
			dataType: 'json',
			success: function (data) {
				
				console.log(data);
				resolve(data);
			},
			error: function (error) {
				resolve(data);
				console.error('Error al obtener datos:', error.responseText);
			}
		});

	});
    
	
}

function mostrar(corte)
{
	

	$.post("../ajax/cita.php?op=4",{id_corte : corte.event.id}, function(data, status)
	{
	    console.log(data);
		data = JSON.parse(data);		
		mostrarFormCorte(true);

		$("#titleLabel").text('Corte para '+data.nombre_usuario);
		$("#id_corte").val(data.id_corte);
		$("#fecha_corte").val(data.fecha_corte+" a las "+data.hora_corte);
		if(data.tipo_corte==0)
		{
			$("#tipo_corte").val('Corte normal');
		}else{
			$("#tipo_corte").val('Corte con diseño');
		}
        $("#imagenmuestra1").show();
		$("#imagenmuestra1").attr("src","../file/cortes/"+data.referencia_corte);
		$("#imagenactual").val(data.referencia_corte);

 	});



}




init();