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
	
	listar();
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




function listar(){
    tabla=$.ajax({
		url: '../ajax/cita.php?op=0',
		type: 'GET',
		dataType: 'json',
		success: function (data) {
			if (data && data.length > 0) {
				// Obtener nombres de columnas
				const columnNames = Object.keys(data[0]);
	
				data.forEach(function (row) {
					columnNames.forEach(function (columnName) {
						const value = row[columnName];
						console.log(`Columna: ${columnName}, Valor: ${value}`);
						
					});
					console.log('---'); // Separador entre filas
				});
				console.log(data) ;
			} else {
				console.log('No se encontraron datos');
			}
		},
		error: function (error) {
			console.error('Error al obtener datos:', error.responseText);
		}
	});
	
}


init();