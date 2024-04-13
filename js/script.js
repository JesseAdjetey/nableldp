let events = {
    Monday: [],
    Tuesday: [],
    Wednesday: [],
    Thursday: [],
    Friday: [],
    Saturday: [],
    Sunday: []
  };
  
  function handleEventClick(event) {
    console.log('Clicked event:', event);
  }
  
  function createEventButton(event) {
    const button = document.createElement('button');
    button.textContent = `${event.time}: ${event.name}`;
    button.className = 'event-button';
    button.draggable = true; 
    button.addEventListener('dragstart', (e) => handleDragStart(e, event)); 
    button.addEventListener('dragend', (e) => handleDragEnd(e)); 
    button.addEventListener('click', () => handleEventClick(event));
    return button;
  }
  
  function handleDragStart(e, event) {
    e.dataTransfer.setData('text/plain', JSON.stringify(event)); 
  }
  
  function handleDragEnd(e) {
  }
  
  function renderDay(day, events) {
    const dayElement = document.createElement('div');
    dayElement.className = 'day';
    dayElement.innerHTML = `<h3>${day}</h3>`;
    events.forEach(event => {
      const eventButton = createEventButton(event);
      dayElement.appendChild(eventButton);
    });
    return dayElement;
  }
  
  function renderCalendar(events) {
    const daysOfWeek = Object.keys(events);
    const calendarElement = document.getElementById('calendar');
    calendarElement.innerHTML = ''; 
    daysOfWeek.forEach(day => {
      const dayElement = renderDay(day, events[day]);
      calendarElement.appendChild(dayElement);
    });
  }
  
  renderCalendar(events);
  
  document.getElementById('eventForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const eventName = document.getElementById('eventName').value;
    const eventTime = document.getElementById('eventTime').value;
    const eventDay = document.getElementById('eventDay').value;
    const event = {
      id: Date.now(), 
      name: eventName,
      time: eventTime
    };
    events[eventDay].push(event); 
    renderCalendar(events);
    this.reset();
  });
  