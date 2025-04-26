<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocHub - Login/Register</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="container">
        <div class="form-box register">
            <form action="register.php" method="POST">
                <h1>Register</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i></i>
                </div> 
                <button type="submit" class="btn">Register</button>
            </form>
        </div>
        <div class="form-box login">
            <form action="process_login.php" method="POST">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i></i>
                </div>
                <div class="forgot-link">
                    <a href="forgot_password.php">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
            <div class="toggle-box">
                <div class="toggle-panel toggle-left">
                    <h1>Hello, Welcome!</h1>
                    <p>Don't have an account ?</p>
                    <button class="btn register-btn">Register</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back! </h1>
                    <p>Already have an account?</p>
                    <button class="btn login-btn">Login</button>
                </div>
            </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>