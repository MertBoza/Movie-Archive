<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js"></script>
    <link rel="icon" href="assets/navLogo.jpg" type="image/x-icon">
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

      <div class="login-container">
        <h2 class="login-title">Log In</h2>
        <form action="#" method="post" class="login-form">
            <label for="username" class="login-label">Username or Email</label>
            <input type="text" id="username" name="username" class="login-input">
            <p id="username-error" class="error-message" style="display: none;">Please enter your username or email.</p>
    
            <label for="password" class="login-label">Password</label>
            <input type="password" id="password" name="password" class="login-input">
            <p id="password-error" class="error-message" style="display: none;">Please enter your password.</p>
    
            <button type="submit" class="login-button">Log In</button>
            <a href="register.php" class="register-button">Register</a>
        </form>
    </div>
    
</body>
</html>