<?php
include_once '../settings/connection.php';

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    $sql = "DELETE FROM events WHERE event_id = $event_id";

    if (mysqli_query($connection, $sql)) {
        header("Location: ../view/task2.php");
        exit();
    } else {
        echo "Error deleting event: " . mysqli_error($connection);
    }
} else {
    header("Location: ../view/task2.php");
    exit();
}
?>
