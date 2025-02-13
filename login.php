<?php
session_start();
include_once 'database.php';
include_once 'users.php';

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $users = new Users($connection);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_info = $users->getUserByEmail($email);
   
    if ($user_info && password_verify($password, $user_info['password'])) {
        $_SESSION['user_id'] = $user_info['id'];
        $_SESSION['email'] = $email;
        $_SESSION['is_admin'] = $user_info['is_admin'];  
        header("Location: home.php");
        exit;
    } else {
        $error_message = "Your email or password is wrong.";
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
            <a href="home.php">
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
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php">Log Out</a></li>
            <?php else: ?>
                <li><a href="login.php">Log In</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="login-container">
        <h2 class="login-title">Log In</h2>
        <form action="login.php" method="post" class="login-form">
            <label for="Email" class="login-label">Email</label>
            <input type="text" id="email" name="email" class="login-input">
            <p id="email-error" class="error-message" style="display: none;">Please enter your email.</p>

            <label for="password" class="login-label">Password</label>
            <input type="password" id="password" name="password" class="login-input">
            <p id="password-error" class="error-message" style="display: none;">Please enter your password.</p>
            
            <?php if (!empty($error_message)): ?>
                <p class="error-message" style="color: red;"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>

            <button type="submit" class="login-button">Log In</button>
            <a href="register.php" class="register-button">Register</a>
        </form>
    </div>

</body>
</html>
