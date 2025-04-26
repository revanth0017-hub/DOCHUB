<?php
// Start the session to store user data across pages
session_start();

// Include the database connection file so we can use $conn
require_once 'db.php';

// Check if the request method is POST (form submitted)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize the username to avoid SQL injection (extra safety)
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    // Get the password entered by the user (raw value, will verify later)
    $password = $_POST['password'];

    // Prepare a SQL query to select the user with the provided username
    // The '?' is a placeholder to prevent SQL injection
    $query = "SELECT * FROM users WHERE username = ?";

    // Prepare the query using the connection object
    $stmt = $conn->prepare($query);

    // Bind the input username to the '?' in the SQL query
    // 's' means the value is a string
    $stmt->bind_param("s", $username);

    // Execute the query
    $stmt->execute();

    // Get the result of the query (result set)
    $result = $stmt->get_result();

    // Fetch the matching row from the result as an associative array
    if ($row = $result->fetch_assoc()) {

        // Verify the password entered by user against the hashed password in DB
        if (password_verify($password, $row['password'])) {

            // If password matches, store the user's ID in session (login success)
            $_SESSION['user_id'] = $row['id'];

            // Redirect to the main/home page
            header("Location: ../index.php");
            exit(); // Stop script execution after redirect
        }
    }

    // If login fails (wrong password or username not found), set error message
    $_SESSION['error'] = "Invalid username or password!";

    // Redirect back to the login page
    header("Location: login.php");
    exit(); // Stop execution
}
?>
