// JavaScript for task page
// document.addEventListener('DOMContentLoaded', function() {
//     const addTaskBtn = document.getElementById('add-task-btn');
//     const taskForm = document.getElementById('task-form');
    
//     // Show task form when add task button is clicked
//     addTaskBtn.addEventListener('click', function() {
//       taskForm.style.display = 'block';
//     });
//   });

  // todoMain();

  // function todoMain(){
  //   let inputElem,ulElem;
  //   getElements();
  //   addListeners();
  // }

  // function getElements(){
  //   inputElem = document.getElementsByTagName("input")[0];
  //   ulElem = document.getElementsByTagName("ul")[0];
  //   console

  // }

  // function addListeners(){
  //   inputElem.addEventListener("change", onChange, false );
  // }

  // function onChange(event){
  //   let inputValue = inputElem.value;
  //   ulElem.innerHTML += "<li>" + inputValue + "</li>";
  //   inputElem.value = ""
  // }

//   document.addEventListener("DOMContentLoaded", function() {
//     const moreButton = document.getElementById("more-button");
//     const moreDetails = document.getElementById("more-details");

//     moreButton.addEventListener("click", function() {
//         moreButton.style.display = "none"; // Hide the "More" button
//         moreDetails.style.display = "block"; // Show the additional task details
//     });
// });

const currentDate = new Date().toISOString().split('T')[0];
const currentTime = new Date().toTimeString().split(' ')[0].slice(0, 5); // Extract only HH:MM part

document.getElementById('event_startdate').value = currentDate;
document.getElementById('event_start_time').value = currentTime;
document.getElementById('event_end_time').value = currentTime;

document.getElementById('more-button').addEventListener('click', function() {
    const moreDetails = document.getElementById('more-details');
    moreDetails.style.display = moreDetails.style.display === 'none' ? 'block' : 'none';
});

document.querySelectorAll('.delete-btn').forEach(function(button) {
  button.addEventListener('click', function() {
      const eventId = button.dataset.eventId;

      const formData = new FormData();
      formData.append('event_id', eventId);
      
      fetch('../actions/delete_event.php', {
          method: 'POST',
          body: formData
      }).then(response => {
          if (response.ok) {
              window.location.href = '../view/task2.php';
          } else {
              console.error('Error deleting event:', response.statusText);
          }
      }).catch(error => {
          console.error('Network error:', error);
      });
  });
});

document.querySelectorAll('.edit-btn').forEach(function(button) {
  button.addEventListener('click', function() {
      const eventElement = button.parentElement;
      const eventId = eventElement.dataset.eventId;
      
      const eventName = eventElement.querySelector('.event-name').innerText;
      const eventStartDate = eventElement.querySelector('.event-startdate').innerText;
      const eventEndDate = eventElement.querySelector('.event-enddate').innerText;
      const eventStartTime = eventElement.querySelector('.event-start_time').innerText;
      const eventEndTime = eventElement.querySelector('.event-end_time').innerText;
      const eventDescription = eventElement.querySelector('.event-description').innerText;
      const eventLocation = eventElement.querySelector('.event-location').innerText;
      
      const eventDetails = {
          event_id: eventId,
          event_name: eventName,
          event_startdate: eventStartDate,
          event_enddate: eventEndDate,
          event_start_time: eventStartTime,
          event_end_time: eventEndTime,
          event_description: eventDescription,
          event_location: eventLocation
          // Add other event details if needed
      };

      // Convert eventDetails object to FormData
      const formData = new FormData();
      for (const key in eventDetails) {
          formData.append(key, eventDetails[key]);
      }

      fetch('../actions/edit_event.php', {
          method: 'POST',
          body: formData
      }).then(response => {
          if (response.ok) {
              // Event updated successfully, redirect back to task2.php
              window.location.href = '../view/task2.php';
          } else {
              // Handle error response
              console.error('Error updating event:', response.statusText);
          }
      }).catch(error => {
          console.error('Network error:', error);
      });
  });
});


