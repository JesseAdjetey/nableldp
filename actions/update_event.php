<?php
// update_event.php

// Include the database connection file
require_once '../settings/connection.php';
var_dump($data)
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode the JSON data received from the client-side
    $data = json_decode(file_get_contents("php://input"));

    // Check if all required fields are present
    if (isset($data->id, $data->start, $data->end, $data->startTime, $data->endTime)) {
        // Sanitize the data
        $event_id = mysqli_real_escape_string($connection, $data->id);
        $start_date = mysqli_real_escape_string($connection, $data->startDate);
        $end_date = mysqli_real_escape_string($connection, $data->endDate);
        $start_time = mysqli_real_escape_string($connection, $data->startTime);
        $end_time = mysqli_real_escape_string($connection, $data->endTime);

        // Update the event record in the database
        $query = "UPDATE events SET 
            event_startdate = '$start_date', 
            event_enddate = '$end_date', 
            event_start_time = '$start_time', 
            event_end_time = '$end_time' 
            WHERE event_id = $event_id";

        if (mysqli_query($connection, $query)) {
            // Event updated successfully
            $response = array("success" => true, "message" => "Event updated successfully");
            echo json_encode($response);
        } else {
            // Error updating event
            $response = array("success" => false, "message" => "Error updating event: " . mysqli_error($connection));
            echo json_encode($response);
        }
    } else {
        // Required fields are missing
        $response = array("success" => false, "message" => "Required fields are missing");
        echo json_encode($response);
    }
} else {
    // Invalid request method
    $response = array("success" => false, "message" => "Invalid request method");
    echo json_encode($response);
}
?>
