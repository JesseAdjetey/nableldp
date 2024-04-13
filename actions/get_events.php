<?php
require_once '../settings/connection.php';

$query = "SELECT * FROM events";
$result = $connection->query($query);

if ($result) {
    $events = [];

    while ($row = $result->fetch_assoc()) {
        // Format start and end datetime strings
        $startDateTime = $row['event_startdate'] . 'T' . $row['event_start_time'];
        $endDateTime = $row['event_enddate'] . 'T' . $row['event_end_time'];

        $events[] = [
            'id' => $row['event_id'],
            'title' => $row['event_name'],
            'start' => $startDateTime,
            'end' => $endDateTime,
            'description' => $row['event_description'],
            'location' => $row['event_location']
        ];
    }

    echo json_encode($events);
} else {
    // Handle query error
    echo json_encode(['error' => 'Failed to fetch events']);
}
?>