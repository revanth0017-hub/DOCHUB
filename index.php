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
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <!-- Header Section -->
    <?php include ('includes/header.php'); ?>
    <!-- Consultation Section -->
    <section class="container my-5 pt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Skip the travel!<br>Take Online Doctor Consultation</h1>
                <p>Private consultation + Audio call • Starts at just ₹199</p>
                <div class="d-flex align-items-center mb-3">
                    <img src="assets/naresh trehan.png" alt="Doctor" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                    <img src="assets/Aruna kalra.png" alt="Doctor" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                    <img src="assets/jamuna pai.png" alt="Doctor" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                    <span class="text-success fw-bold">+150 Doctors are online</span>
                </div>
                <a href="appointment.php" class="btn btn-primary">Consult Now</a>
            </div>
            <div class="col-md-6">
                <img src="assets/consul.png" alt="Consultation" class="img-fluid rounded">
            </div>
        </div>
    </section>
    <!-- Specialties Section -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Explore Our Specialists</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4" id="specialties-container">
            <!-- Initial Doctors (Visible by Default) -->
            <div class="col">
                <div class="card h-100 text-center">
                    <img src="assets/cardiology.png" class="card-img-top mx-auto mt-3" alt="Cardiology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Cardiology</h5>
                        <p class="card-text">Heart-related issues and treatments</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center">
                    <img src="assets/neurology.png" class="card-img-top mx-auto mt-3" alt="Neurology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Neurology</h5>
                        <p class="card-text">Brain and nervous system care</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center">
                    <img src="assets/orthopedics.png" class="card-img-top mx-auto mt-3" alt="Orthopedics" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Orthopedics</h5>
                        <p class="card-text">Bone and joint health</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/pediatrics.png" class="card-img-top mx-auto mt-3" alt="Pediatrics" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Pediatrics</h5>
                        <p class="card-text">Child health and development</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/gynecology.png" class="card-img-top mx-auto mt-3" alt="Gynecology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Gynecology</h5>
                        <p class="card-text">Women's reproductive health</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/oncology.png" class="card-img-top mx-auto mt-3" alt="oncology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Oncology</h5>
                        <p class="card-text">Cancer diagnosis and treatment</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/ophthalmology.png" class="card-img-top mx-auto mt-3" alt="ophthalmology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Ophthalmology</h5>
                        <p class="card-text">Eye care and vision health</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/physiotherapy.png" class="card-img-top mx-auto mt-3" alt="physiotherapy" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Physiotherapy</h5>
                        <p class="card-text">Physical rehabilitation</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/pulmonology.png" class="card-img-top mx-auto mt-3" alt="pulmonology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Pulmonology</h5>
                        <p class="card-text">Respiratory system care</p>
                    </div>
                </div>
            </div>
            <!-- Hidden Doctors (Initially Hidden) -->
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/dermatology.png" class="card-img-top mx-auto mt-3" alt="Dermatology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Dermatology</h5>
                        <p class="card-text">Skin care and treatments</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/gastroenterology.png" class="card-img-top mx-auto mt-3" alt="Gastroenterology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Gastroenterology</h5>
                        <p class="card-text">Digestive system care</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/Rheumatologist.png" class="card-img-top mx-auto mt-3" alt="rheumatology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Rheumatology</h5>
                        <p class="card-text">Joint and autoimmune diseases</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/Psychiarty.png" class="card-img-top mx-auto mt-3" alt="psychiatry" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Psychiatry</h5>
                        <p class="card-text">Mental health and well-being</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/nephrology.png" class="card-img-top mx-auto mt-3" alt="nephrology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Nephrology</h5>
                        <p class="card-text">Kidney health and diseases</p>
                    </div>
                </div>
            </div>
            <div class="col d-none">
                <div class="card h-100 text-center">
                    <img src="assets/endocrinology.png" class="card-img-top mx-auto mt-3" alt="endocrinology" style="width: 100px; height: 100px;">
                    <div class="card-body">
                        <h5 class="card-title">Endocrinology</h5>
                        <p class="card-text">Hormonal and metabolic care</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" id="view-more-button">
            <button class="btn btn-primary text-center mt-4"  onclick="viewMoreDoctors()">View More Doctors</button>
        </div>
    </section>
    <!-- Offers Section -->
    <section class="offers-section">
        <h2>Exciting Offers</h2>
        <div class="offers-container">
            <div class="offer-card">
                <h3>First Consultation Free</h3>
                <p>Get your first online consultation absolutely free!</p>
            </div>
            <div class="offer-card">
                <h3>20% Off on Follow-ups</h3>
                <p>Avail 20% discount on follow-up consultations.</p>
            </div>
            <div class="offer-card">
                <h3>Family Package</h3>
                <p>Consult for your entire family at a discounted rate.</p>
            </div>
            <div class="offer-card">
                <h3>Health Checkup</h3>
                <p>Book a full health checkup and get 15% off.</p>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Section -->
    <section class="why-choose-us-section">
        <h2>Why Choose Us?</h2>
        <div class="why-choose-us-container">
            <!-- Card 1 -->
            <div class="why-choose-us-card">
                <img src="assets/Service.png" alt="24/7 Support">
                <h3>24/7 Support</h3>
                <p>Access to doctors anytime, anywhere. We're here for you round the clock.</p>
            </div>
            <!-- Card 2 -->
            <div class="why-choose-us-card">
                <img src="assets/affordable.png" alt="Affordable">
                <h3>Affordable Consultations</h3>
                <p>High-quality care at an affordable price, starting at just ₹199.</p>
            </div>
            <!-- Card 3 -->
            <div class="why-choose-us-card">
                <img src="assets/Expert Doctor.png" alt="Expert Doctors">
                <h3>Expert Doctors</h3>
                <p>Consult with verified and experienced doctors from top hospitals.</p>
            </div>
            <!-- Card 4 -->
            <div class="why-choose-us-card">
                <img src="assets/privacy.png" alt="Privacy">
                <h3>100% Privacy</h3>
                <p>Your data and consultations are completely confidential.</p>
            </div>
        </div>
    </section>
    <script src="js/home.js"></script>
    <!-- Footer Section -->
     <?php include ('includes/footer.php'); ?>
</body>
</html>