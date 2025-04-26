<?php
session_start();
require_once 'register_login/db.php';
$username = '';
if(isset($_SESSION['user_id'])) {
    $query = "SELECT username FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()) {
        $username = $row['username'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DocHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/appointment.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/colors.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
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
    <main>
      <section class="hero">
        <h1>Book Your Doctor Appointment</h1>
        <p>Find and book appointments with top doctors in your area</p>
      </section>
      <section class="search-section">
        <div class="search-container">
          <select id="specialtySelect" class="specialty-select">
            <option value="">Select Specialty</option>
          </select>
          <input type="text" id="locationInput" placeholder="Enter Location" class="location-input">
          <button id="searchButton" class="search-button btn btn-primary">Search</button>
        </div>
      </section>
      <section class="background-doctors-list">
      <section class="doctors-list" id="doctorsList">
        <!-- Doctors will be populated here -->
      </section>
    </section>
      <section class="video-consultation">
        <div class="consultation-container">
          <div class="consultation-content">
            <h2>Need an Instant Video Consultation?</h2>
            <p>Connect with experienced doctors from the comfort of your home</p>
            <div class="consultation-features">
              <div class="feature">
                <span class="feature-icon">🕒</span>
                <h3>24/7 Availability</h3>
                <p>Connect with doctors anytime, anywhere</p>
              </div>
              <div class="feature">
                <span class="feature-icon">💊</span>
                <h3>Digital Prescription</h3>
                <p>Get prescriptions directly to your email</p>
              </div>
              <div class="feature">
                <span class="feature-icon">💰</span>
                <h3>Affordable Rates</h3>
                <p>Pay only for the time you consult</p>
              </div>
            </div>
            <button id="startConsultation" class="btn btn-primary">Start Video Consultation</button>
          </div>
        </div>
      </section>
    </main>

    <div id="bookingModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Book Appointment</h2>
        <form id="bookingForm">
          <input type="text" id="patientName" placeholder="Your Name" required>
          <input type="email" id="patientEmail" placeholder="Your Email" required>
          <input type="tel" id="patientPhone" placeholder="Your Phone" required>
          <input type="date" id="appointmentDate" required>
          <select id="appointmentTime" required>
            <option value="">Select Time</option>
          </select>
          <button type="submit" class="book-button btn btn-primary">Confirm Booking</button>
        </form>
      </div>
    </div>
    <div id="consultationModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Start Video Consultation</h2>
        <form id="consultationForm">
          <input type="text" id="consultName" placeholder="Your Name" required>
          <input type="email" id="consultEmail" placeholder="Your Email" required>
          <input type="tel" id="consultPhone" placeholder="Your Phone" required>
          <select id="consultSpecialty" required>
            <option value="">Select Specialty</option>
          </select>
          <textarea id="consultSymptoms" placeholder="Describe your symptoms briefly" required></textarea>
          <button type="submit" class="consultation-button btn btn-primary">Start Consultation</button>
        </form>
      </div>
    </div>
    <?php include ("includes/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="js/appointment.js"></script>
  </body>
</html>