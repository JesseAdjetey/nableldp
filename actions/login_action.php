<?php
session_start();

// Include the database connection
include('../settings/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement to fetch user details based on email
    $query = "SELECT * FROM users WHERE email = '$email'";
    
    // Execute the query
    $result = $connection->query($query);

    if ($result) {
        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Fetch user details from the result set
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['name'] = $user['name'];

                if ($user['first_login'] == TRUE) {
                    // Update the first_login flag to FALSE for subsequent logins
                    // This ensures that the user will be redirected to the dashboard on subsequent logins
                    $stmt = $connection->prepare("UPDATE users SET first_login = FALSE WHERE user_id = ?");
                    $stmt->bind_param("i", $user['user_id']);
                    $stmt->execute();
                    $stmt->close();
            
                    // Redirect the user to a certain page for the first login (e.g., onboarding page)
                    header("Location: ../view/home.php");
                    exit();
                } else {
                    // Redirect the user to a different page for subsequent logins (e.g., dashboard)
                    header("Location: ../view/task2.php");
                    exit();
                }
                exit();
            } else {
                // Password is incorrect
                $error_message = "Invalid password. Please try again.";
            }
        } else {
            // No user found with the provided email
            $error_message = "No user found with the provided email.";
        }
    } else {
        // Error executing the query
        $error_message = "Error: " . $connection->error;
    }
}

// If execution reaches this point, there was an error in the login process
// Redirect back to the login page with an error message
$_SESSION['error_message'] = $error_message;
header("Location: ../login/login_view.php");
exit();
?>
