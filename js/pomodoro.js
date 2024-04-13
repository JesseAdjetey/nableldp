// Get the elements
const timerDisplay = document.querySelector('.time-display');
const startBtn = document.getElementById('start-btn');
const pauseBtn = document.getElementById('pause-btn');
const resetBtn = document.getElementById('reset-btn');

let timer; // Variable to store the timer interval
let timeLeft = 25 * 60; // Initial time in seconds (25 minutes)

// Function to update the timer display
function updateTimerDisplay() {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
}

// Function to start the timer
function startTimer() {
    timer = setInterval(() => {
        if (timeLeft > 0) {
            timeLeft--;
            updateTimerDisplay();
        } else {
            clearInterval(timer);
            alert('Time\'s up!');
        }
    }, 1000); // Update every second
}

// Event listener for the start button
startBtn.addEventListener('click', () => {
    startTimer();
});

// Event listener for the pause button
pauseBtn.addEventListener('click', () => {
    clearInterval(timer);
});

// Event listener for the reset button
resetBtn.addEventListener('click', () => {
    clearInterval(timer);
    timeLeft = 25 * 60; // Reset time
    updateTimerDisplay();
});

// Initial display
updateTimerDisplay();
