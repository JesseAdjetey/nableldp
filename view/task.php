<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/task.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=TAN Headline:wght@400;500;600;700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=PT Sans:wght@400;500;600;700">
   
</head>
<body>
    <section id="Sidebar">
        <a href="../view/home.php" class="collection">
        <i class='bx bx-menu'></i>
        <span class="text">  n<span class="purple-text">Able</span></span>

        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="../view/task.php">
                    <i class='bx bxs-bullseye'></i>
                    <span class="text">Add Task</span>
                </a>
            </li>
            <li>
                <a href="../view/calendar.php">
                    <i class='bx bxs-calendar'></i>
                    <span class="text">Calendar</span>
                </a>
            </li>
            <li>
                <a href="../view/productivity.php">
                    <i class='bx bxs-select-multiple'></i>
                    <span class="text">Productivity</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../login/logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">LOGOUT</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="task-form-container">
        <form action="../actions/add_event.php" method="POST" id="task-form">
            <label for="event_name">Task:</label>
            <input type="text" id="event_name" name="event_name" required>
            <label for="event_startdate">Date:</label>
            <input type="date" id="event_startdate" name="event_startdate" required>
            <label for="event_start_time">Start Time:</label>
            <input type="time" id="event_start_time" name="event_start_time" required>
            <label for="event_end_time">End Time:</label>
            <input type="time" id="event_end_time" name="event_end_time" required>
            <div id="more-details" style="display: none;">
                <!-- Additional task details -->
                <label for="event_description">Description:</label>
                <input type="text" id="event_description" name="event_description">
                <label for="event_location">Location:</label>
                <input type="text" id="event_location" name="event_location">
            </div>
            <button type="button" id="more-button">More</button>
            <button type="submit"  name="submit" id = "submit">Create Task</button>
        </form>
    </section>

   

    <script src="../js/task.js"></script>
</body>
</html>
