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
      }
      

    });
    calendar.render();
  });


 


function init(){
    //Para validación
	

	mostrarform(false);
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

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
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




init();