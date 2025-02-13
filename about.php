<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/navLogo.jpg" type="image/x-icon">
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

      <div class="about-container">
        <h2 class="about-title">About Us</h2>
        <section class="about-section">
            <p class="about-text">
                Welcome to Movie Archive, your go-to destination for everything related to movies! We are a passionate team of movie lovers dedicated to bringing you a comprehensive collection of films from various genres, eras, and cultures. Whether you're a casual viewer or a die-hard cinephile, we have something for everyone.
            </p>
            <p class="about-text">
                Our mission is simple: to create a vast and easily accessible archive of movies, with detailed information about each film, including summaries, cast and crew, and more. At Movie Archive, we believe that every movie has a story to tell, and we aim to make it easy for you to discover, explore, and enjoy them all.
            </p>
            <p class="about-text">
                Thank you for being a part of our movie-loving community. We hope you enjoy browsing through our collection and find inspiration for your next movie night!
            </p>
        </section>
    </div>
    
</body>
</html>