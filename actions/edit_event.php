<?php
include('../settings/core.php');
include('../settings/connection.php');

checkLogin();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $event_id = $_GET["id"];

    // Fetch event data from the database based on event_id
    $query = "SELECT * FROM events WHERE event_id = $event_id";
    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
        $event = $result->fetch_assoc();
    } else {
        echo "Error: Event not found.";
        exit;
    }
} else {
    echo "Error: Invalid request.";
    exit;
}

// Handle form submission for editing event
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $event_name = $_POST["event_name"]; // Assuming event_name is posted from the form
    $event_name = htmlspecialchars(trim($_POST["event_name"]));
    $event_startdate = htmlspecialchars(trim($_POST["event_startdate"]));
    $event_enddate = htmlspecialchars(trim($_POST["event_enddate"]));
    $event_start_time = htmlspecialchars(trim($_POST["event_start_time"]));
    $event_end_time = htmlspecialchars(trim($_POST["event_end_time"]));
    $event_description = htmlspecialchars(trim($_POST["event_description"]));
    $event_location = htmlspecialchars(trim($_POST["event_location"]));
    
    // Update event in the database
    $query = "UPDATE events SET event_name = '$event_name' WHERE event_id = $event_id";
    $result = $connection->query($query);

    if ($result) {
        // Redirect back to task2.php after editing
        header("Location: task2.php");
        exit;
    } else {
        echo "Error: Failed to update event.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <!-- Include your CSS and other necessary stylesheets -->

</head>
<body>
    <section id="edit-event-container">
        <h2>Edit Event</h2>
        <!-- Form for editing event -->
        <form action="" method="POST">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" value="<?php echo $event['event_name']; ?>" required>
            <!-- Populate other form fields with event data -->
            <button type="submit">Update Event</button>
        </form>
    </section>

    <!-- Include necessary JS files for form validation or other functionalities -->
    <!-- Include your scripts -->

</body>
</html>
