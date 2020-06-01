<!-- calendario -->
<link href="../../dist/calendario/core/main.css" rel="stylesheet">
<link href="../../dist/calendario/daygrid/main.css" rel="stylesheet">
<link href="../../dist/calendario/list/main.css" rel="stylesheet">
<link href="../../dist/calendario/timegrid/main.css" rel="stylesheet">


<script src="../../dist/calendario/core/main.js"></script>
<script src="../../dist/calendario/daygrid/main.js"></script>
<script src="../../dist/calendario/interaction/main.js"></script>
<script src="../../dist/calendario/list/main.js"></script>
<script src="../../dist/calendario/timegrid/main.js"></script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events-list');
    new Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText.trim()
        }
      }
    });

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/
    var calHeight = 420;
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      
      slotLabelFormat: {
        hour: 'numeric',
        minute: '2-digit',
        omitZeroMinute: true,
        meridiem: 'short'
      },
      
      allDaySlot: false,
      height:calHeight,
      contentHeight:calHeight,
      defaultView: 'timeGridWeek',
      header: {
        left: 'prev,next',
        center: 'title',
        right: 'timeGridWeek,listWeek'
      },
      timeFormat: 'H(:mm)',
      locale: 'es',
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        //if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        //}
      },
      events: {
        url: '/teleconsulta/controllers/consulta/getConsultas.php',
        failure: function() {
          console.log("Error obteniendo consultas via AJAX");
          //document.getElementById('script-warning').style.display = 'block'
        }
      },
      loading: function(bool) {
        /*
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
          */
      }

    });
    calendar.render();

  });
function guardarConsulta(consulta) {
  jQuery.post(
    '/teleconsulta/controllers/consulta/createConsulta', 
    {
      title: consulta.title,
      start: consulta.start,
      end:   consulta.end
    }
  );
}
</script>
<style>

  body {
    margin-top: 40px;
    font-size: 14px;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  }

  #wrap {
    width: 1000px;
    margin: 0 auto;
  }

  #external-events {
    float: left;
    width: 150px;
    padding: 0 10px;
    border: 1px solid #ccc;
    background: #eee;
    text-align: left;
  }

  #external-events h4 {
    font-size: 16px;
    margin-top: 0;
    padding-top: 1em;
  }

  #external-events .fc-event {
    margin: 10px 0;
    cursor: pointer;
  }

  #external-events p {
    margin: 1.5em 0;
    font-size: 11px;
    color: #666;
  }

  #external-events p input {
    margin: 0;
    vertical-align: middle;
  }

  #calendar {
    float: left;
    width: 850px;
  }

</style>

<div id='wrap'>

  <div id='external-events'>
    <h4>Citas arrastrables al calendario</h4>

    <div id='external-events-list'>
      <div class='fc-event'>Cita 29/05/2020<br>Ariana Volcanes</div>
      <div class='fc-event'>Cita 29/05/2020<br>Andrés Vega</div>
      <div class='fc-event'>Cita 28/05/2020<br>Luis Rivas</div>
      <div class='fc-event'>Cita 28/05/2020<br>Sergio Pérez</div>
      <div class='fc-event'>Cita 27/05/2020<br>Ricardo Rondón</div>
    </div>
    <!--
    <p>
      <input type='checkbox' id='drop-remove' />
      <label for='drop-remove'>Quitar al soltar</label>
    </p>
    -->
    <button class="fc-event btn-info" id="">Agregar Nuevo Evento</button>
    
  </div>

  <div id='calendar'></div>

  <div style='clear:both'></div>

</div>
<!-- calendario -->
