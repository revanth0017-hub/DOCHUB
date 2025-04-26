<?php
// Start the session to access session variables
session_start();

// Include the database connection file
require_once 'db.php';

// If user is not logged in (i.e., no user_id in session), redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: register_login/login.php");
    exit(); // Stop script execution
}

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get user_id from session
    $user_id = $_SESSION['user_id'];

    // Collect and sanitize form inputs
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);           
    $dob = $_POST['dob'];                                                       
    $gender = $_POST['gender'];                                                 
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);                 
    $address = mysqli_real_escape_string($conn, $_POST['address']);            
    $emergency_name = mysqli_real_escape_string($conn, $_POST['emergency_name']);   
    $emergency_phone = mysqli_real_escape_string($conn, $_POST['emergency_phone']); e

    // Prepare an SQL query using placeholders to prevent SQL injection
    $query = "INSERT INTO user_details (user_id, fullname, dob, gender, phone, address, emergency_name, emergency_phone) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($query);

    // Bind the actual values to the placeholders in the query
    $stmt->bind_param("isssssss", 
        $user_id, $fullname, $dob, $gender, $phone, $address, $emergency_name, $emergency_phone
    );

    // Execute the query
    if ($stmt->execute()) {
        // If successful, redirect to homepage (index.php)
        header("Location: ../index.php");
        exit();
    } else {
        // If failed, store an error message and redirect back to the form
        $_SESSION['error'] = "Failed to save details!";
        header("Location: user_details.php");
        exit();
    }
}
?>
