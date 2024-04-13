<?php
// Include the database connection file
include('../settings/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $occupation = $_POST['occupation'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $inst_id = $_POST['inst_id'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Perform password validation
    if ($password !== $confirm_password) {
        // Passwords do not match, handle the error (e.g., redirect back with error message)
        header("Location: ../login/register_view.php?error=password_mismatch");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement to insert user data into the database
    $stmt = $connection->prepare("INSERT INTO users (name, age, gender, occupation, email, number, password, inst_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssssi", $name, $age, $gender, $occupation, $email, $number, $hashed_password, $inst_id);

    if ($stmt->execute()) {
        // Registration successful, redirect to login page or any other desired page
        header("Location: ../login/login_view.php");
        exit();
    } else {
        // Error occurred during registration, handle the error (e.g., redirect back with error message)
        header("Location: ../login/register_view.php?error=registration_failed");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();
} else {
    // Form not submitted, redirect to register view
    header("Location: ../login/register_view.php");
    exit(); 
}
?>
