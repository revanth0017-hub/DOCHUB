<?php
// Start a session to store user data
session_start();

// Include the database connection
require_once 'db.php';

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize the input values to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Hash the password before storing it for security
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the username or email already exists in the database
    $check_query = "SELECT * FROM users WHERE username = ? OR email = ?";

    // Prepare the query to prevent SQL injection
    $stmt = $conn->prepare($check_query);

    // Bind both username and email to the placeholders in the query
    $stmt->bind_param("ss", $username, $email);

    // Execute the prepared query
    $stmt->execute();

    // Get the result from the query
    $result = $stmt->get_result();

    // If a record already exists with the same username or email
    if ($result->num_rows > 0) {
        // Set an error message in the session and redirect back to login/register page
        $_SESSION['error'] = "Username or email already exists!";
        header("Location: login.php");
        exit();
    }

    // If no duplicate found, insert the new user into the database
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    // Prepare the insert statement
    $stmt = $conn->prepare($query);

    // Bind the user input values to the insert query
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the insert query
    if ($stmt->execute()) {
        // Store the new user ID in session and redirect to the next page
        $_SESSION['user_id'] = $stmt->insert_id;

        // Redirect to user details form after successful registration
        header("Location: user_details.php");
        exit();
    } else {
        // If insert fails, set error message and redirect back
        $_SESSION['error'] = "Registration failed!";
        header("Location: login.php");
        exit();
    }
}
?>
