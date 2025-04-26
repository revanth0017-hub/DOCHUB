<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Registration - DocHub</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #2a5c99;
            --secondary-blue: #4a90e2;
            --light-blue: #e8f2ff;
            --text-gray: #4a5568;
            --light-gray: #f7fafc;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
            padding: 20px;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(23, 42, 83, 0.85);
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 10;
            max-width: 900px;
            width: 100%;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue)) !important;
            padding: 1.5rem;
            border-bottom: none;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-align: center;
        }

        .card-body {
            padding: 2.5rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-gray);
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            height: 50px;
            border: 1px solid rgba(74, 144, 226, 0.3);
            border-radius: 10px;
            padding: 0.75rem 1.25rem;
            background-color: rgba(245, 249, 255, 0.8);
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
            background-color: var(--white);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.3s;
            width: 100%;
            margin-top: 1rem;
            box-shadow: 0 10px 20px rgba(74, 144, 226, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1a3a6a, #3a7bc8);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(58, 123, 200, 0.4);
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-blue);
            pointer-events: none;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }
            
            .row > div {
                margin-bottom: 1rem;
            }
            
            .row > div:last-child {
                margin-bottom: 0;
            }
        }

        @media (max-width: 576px) {
            .card-header {
                padding: 1rem;
            }
            
            .card-header h3 {
                font-size: 1.5rem;
            }
            
            .card-body {
                padding: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3><i class="fas fa-user-edit me-2"></i>Complete Your Profile</h3>
            </div>
            <div class="card-body">
                <form action="process_details.php" method="POST">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label">Full Name</label>
                            <div class="input-icon">
                                <input type="text" name="fullname" class="form-control" required>
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date of Birth</label>
                            <div class="input-icon">
                                <input type="date" name="dob" class="form-control" required>
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label">Gender</label>
                            <div class="input-icon">
                                <select name="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <i class="fas fa-venus-mars"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <div class="input-icon">
                                <input type="tel" name="phone" class="form-control" required>
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Address</label>
                        <div class="input-icon">
                            <textarea name="address" class="form-control" rows="3" required></textarea>
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label">Emergency Contact Name</label>
                            <div class="input-icon">
                                <input type="text" name="emergency_name" class="form-control" required>
                                <i class="fas fa-user-shield"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Emergency Contact Number</label>
                            <div class="input-icon">
                                <input type="tel" name="emergency_phone" class="form-control" required>
                                <i class="fas fa-phone-alt"></i>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check-circle me-2"></i>Complete Registration
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>