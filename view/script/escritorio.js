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