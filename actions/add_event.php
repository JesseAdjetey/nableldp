<?php

include('../settings/connection.php');

session_start();

if (isset($_POST['submit'])) {
    echo "Form submitted successfully!<br>";
    
    $user_id = $_SESSION['user_id']; 
    echo "User ID: $user_id<br>";
    $event_name = mysqli_real_escape_string($connection, $_POST['event_name']);
    $event_startdate = $_POST['event_startdate'];
    $event_start_time = $_POST['event_start_time'];
    $event_end_time = $_POST['event_end_time'];
    $event_description = isset($_POST['event_description']) ? mysqli_real_escape_string($connection, $_POST['event_description']) : null;
    $event_location = isset($_POST['event_location']) ? mysqli_real_escape_string($connection, $_POST['event_location']) : null;

    // Calculate the event end date
    $event_enddate = $event_startdate;
    $event_end_time_timestamp = strtotime($event_end_time);
    $current_time_timestamp = strtotime(date('H:i:s'));

    // Check if event end time exceeds the current day
    if ($event_end_time_timestamp > $current_time_timestamp) {
        $event_enddate = date('Y-m-d', strtotime("$event_startdate +1 day"));
    }

    // Prepare and execute the SQL statement to insert event data into the database
    $stmt = $connection->prepare("INSERT INTO events (user_id, event_name, event_startdate, event_enddate, event_start_time, event_end_time, event_description, event_location) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $user_id, $event_name, $event_startdate, $event_enddate, $event_start_time, $event_end_time, $event_description, $event_location);

    if ($stmt->execute()) {
        // Event added successfully, redirect to dashboard or any other desired page
        header("Location: ../view/task2.php");
        exit(); 
    } else {
        // Error occurred during event addition, handle the error (e.g., redirect back with error message)
        echo "Error: " . $stmt->error . "<br>";
        header("Location: ../view/task.php?error=event_addition_failed");
        exit(); 
    }

    $stmt->close();
    $connection->close();
} else {
    // If the form is not submitted, redirect back to add_event.php
    header("Location: ../view/task2.php");
    exit(); 
}
?>
