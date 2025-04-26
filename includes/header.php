<?php
session_start();  // Starts the session or resumes the existing session
require_once __DIR__ . '/../register_login/db.php';  // Includes the database connection file

$username = '';  // Initialize $username as an empty string

// Check if the user is logged in by checking if user_id is set in session
if(isset($_SESSION['user_id'])) {  
    // Prepare SQL query to select username based on user_id
    $query = "SELECT username FROM users WHERE id = ?";  
    
    $stmt = $conn->prepare($query);  // Prepare the SQL query
    $stmt->bind_param("i", $_SESSION['user_id']);  // Bind user_id (session) as an integer to the query
    $stmt->execute();  // Execute the prepared statement

    $result = $stmt->get_result();  // Get the result of the query execution
    
    // If a row is fetched, assign the username to the $username variable
    if($row = $result->fetch_assoc()) {  
        $username = $row['username'];  // Set the username
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="logo navbar-brand d-flex align-items-center" href="index.php">
                <img src="assets/Logo.png" alt="Logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="appointment.php">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="medicine_booking.php">Online Pharmacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="medicine_analysis.php">Medicine Analyzer</a>
                    </li>
                    <?php if(!isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="register_login/login.php">
                            <button class="btn btn-primary">Login/Register</button>
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>
                            <?php echo htmlspecialchars($username); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <!-- <li><a class="dropdown-item" href="profile.php">My Profile</a></li> -->
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="register_login/logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>