<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/navLogo.jpg" type="image/x-icon">
    <title>Movie Archive - News</title>
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

    <div class="news-container">
        <h1 class="news-title">Latest Movie News</h1>
        <div class="news-card">
            <h3 class="news-heading">"Oppenheimer" Wins Best Picture at the 2024 Oscars</h3>
            <p class="news-text">Christopher Nolan’s masterpiece "Oppenheimer" took home the top prize, cementing its place in cinematic history.</p>
            <a href="#" class="read-more">Read More</a>
        </div>

        <div class="news-card">
            <h3 class="news-heading">"The Godfather" Returns to Theaters</h3>
            <p class="news-text">Francis Ford Coppola’s iconic "The Godfather" celebrates its 50th anniversary with a limited re-release.</p>
            <a href="#" class="read-more">Read More</a>
        </div>

        <div class="news-card">
            <h3 class="news-heading">Christopher Nolan Announces New Sci-Fi Project</h3>
            <p class="news-text">The acclaimed director behind "Inception" and "Interstellar" teases his next ambitious film set in space.</p>
            <a href="#" class="read-more">Read More</a>
        </div>

        <div class="news-card">
            <h3 class="news-heading">Quentin Tarantino’s Final Film: What We Know</h3>
            <p class="news-text">The legendary filmmaker is preparing for his swan song, and fans are buzzing with anticipation.</p>
            <a href="#" class="read-more">Read More</a>
        </div>
    </div>
</body>
</html>

</body>
</html>