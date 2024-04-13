document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var initialTimeZone = 'UTC';
  var timeZoneSelectorEl = document.getElementById('time-zone-selector');
  var loadingEl = document.getElementById('loading');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: initialTimeZone,
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    navLinks: true,
    editable: true,
    selectable: true,
    dayMaxEvents: true, 
    events: "../actions/get_events.php",

    
    eventTimeFormat: { hour: 'numeric', minute: '2-digit', timeZoneName: 'short' }
    ,
        eventDrop: function(info) {
          var eventData = {
            id: info.event.id,
            start: info.event.startStr,
            end: info.event.endStr,
            startTime: info.event.start.getHours() + ":" + info.event.start.getMinutes(), 
            endTime: info.event.end?.getHours() + ":" + info.event.end?.getMinutes(),
            startDate: info.event.startStr.split('T')[0], 
            endDate: info.event.endStr.split('T')[0] 
            };
            console.log(eventData)

            
            fetch('../actions/update_event.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(eventData)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); 
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
  });

  calendar.render();

  fetch('https://fullcalendar.io/api/demo-feeds/timezones.json')
    .then((response) => response.json())
    .then((timeZones) => {
      timeZones.forEach(function(timeZone) {
        var optionEl;

        if (timeZone !== 'UTC') { 
          optionEl = document.createElement('option');
          optionEl.value = timeZone;
          optionEl.innerText = timeZone;
          timeZoneSelectorEl.appendChild(optionEl);
        }
      });
});

timeZoneSelectorEl.addEventListener('change', function() {
  calendar.setOption('timeZone', this.value);
});

});