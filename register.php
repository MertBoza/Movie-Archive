<?php
include_once 'database.php';
include_once 'users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $users = new Users($connection);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if ($users->register($username, $email, $phone, $password)) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error registering user!";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/navLogo.jpg" type="image/x-icon">
    <script src="assets/script.js"></script>
    <title>Movie Archive</title>
</head>
<body>

    <nav class="navbar">
        <div class="logo">
            <a href="home.html">
                <img class="logo1" src="assets/navLogo.jpg" alt="navLogo">
            </a>
        </div>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="login.php">Log In</a></li>
        </ul>
      </nav>

      <div class="register-container">
        <h2 class="register-title">Register</h2>
        <form action="register.php" method="post" class="register-form">
            <label for="username" class="register-label">Username</label>
            <input type="text" id="username" name="username" class="register-input">
            <p id="username-error" class="error-message" style="display: none;">Please enter a username.</p>

            <label for="email" class="register-label">Email</label>
            <input type="email" id="email" name="email" class="register-input">
            <p id="email-error" class="error-message" style="display: none;">Please enter a valid email.</p>

            <label for="phone" class="register-label">Phone Number</label>
            <input type="number" id="phone" name="phone" class="register-input">
            <p id="phone-error" class="error-message" style="display: none;">Please enter a valid phone number.</p>

            <label for="password" class="register-label">Password</label>
            <input type="password" id="password" name="password" class="register-input">
            <p id="password-error" class="error-message" style="display: none;">Please enter a password.</p>

            <label for="confirm-password" class="register-label">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" class="register-input">
            <p id="confirm-password-error" class="error-message" style="display: none;">Passwords do not match.</p>

            <button type="submit" class="register-button">Register</button>
        </form>
    </div>
    
    
</body>
</html>