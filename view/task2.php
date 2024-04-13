<?php
include('../settings/core.php');
include('../settings/connection.php');

checkLogin();

// Fetch events from the database
$query = "SELECT * FROM events WHERE user_id = {$_SESSION['user_id']} ORDER BY event_startdate, event_start_time";
$result = $connection->query($query);

if ($result) {
    $events = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Error: " . $connection->error;
}
?>

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
    <link rel="stylesheet" href=
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

    <section id="task-list-container">
        <h2>To-Do List</h2>
        <div id="task-list">
            <!-- PHP code to display events -->
            <?php
        if (!empty($events)) {
            foreach ($events as $event) {
                echo '<div class="draggable-btn" data-event-id="' . $event["event_id"] . '">';
                    echo '<button class="edit-btn"><i class="bx bx-edit"></i></button>'; // Edit button
                    echo '<span>' . $event["event_name"] . '</span>';
                    echo '<a class="delete-btn" href="../actions/delete_event.php?id=' . $event["event_id"] . '"><i class="bx bx-trash"></i></a>'; // Delete button
                    echo '</div>';
            }
        } else {
            echo '<p>No events found.</p>';
        }
?>

        </div>
        
    </section>

    <a href="task.php" id="add-task-button">Add Task</a>    

    <!-- Include necessary JS files for making buttons draggable and sortable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        // Make buttons draggable and sortable
        new Sortable(document.getElementById('task-list'), {
            animation: 150,
            // Add any necessary options for sorting
        });
    </script>

    <script src="../js/task.js"></script>
</body>
</html>
