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


    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
    <button class="details-button" onclick="location.href='createMovie.php'">Create New Movie</button>
    <button class="details-button" onclick="location.href='edit_movies.php'">Edit Movies</button>
    <?php endif; ?>

      <div class="movie-cards-container">
        <div class="movie-card">
            <img src="assets/theGodfather.jpeg" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">The Godfather</h3>
                <p class="director">Director: Francis Ford Coppola</p>
                <p class="categories">Categories: Crime, Drama</p>
                <button class="details-button">More Details</button>
            </div>
        </div>

        <div class="movie-card">
            <img src="assets/interstellar.jpg" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">Interstellar</h3>
                <p class="director">Director: Christopher Nolan</p>
                <p class="categories">Categories: Science Fiction, Drama</p>
                <button class="details-button">More Details</button>
            </div>
        </div>

        <div class="movie-card">
            <img src="assets/theShawshankRedemption.jpg" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">The Shawshank Redemption</h3>
                <p class="director">Director: Frank Darabont</p>
                <p class="categories">Categories: Prison Drama, Drama</p>
                <button class="details-button">More Details</button>
            </div>
        </div>

        <div class="movie-card">
            <img src="assets/inception.jpg" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">Inception</h3>
                <p class="director">Director: Christopher Nolan</p>
                <p class="categories">Categories: Science Fiction, Action</p>
                <button class="details-button">More Details</button>
            </div>
        </div>

        <div class="movie-card">
            <img src="assets/thePianist.jpg" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">The Pianist</h3>
                <p class="director">Director: Roman Polanski</p>
                <p class="categories">Categories: Biography, War</p>
                <button class="details-button">More Details</button>
            </div>
        </div>

        <div class="movie-card">
            <img src="assets/thePrestige.jpg" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">The Prestige</h3>
                <p class="director">Director: Christopher Nolan</p>
                <p class="categories">Categories: Tragedy, Mystery</p>
                <button class="details-button">More Details</button>
            </div>
        </div>

        <div class="movie-card">
            <img src="assets/djangoUnchained.jpg" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">Django Unchained</h3>
                <p class="director">Director: Quentin Tarantino</p>
                <p class="categories">Categories: Western, Dark Comedy</p>
                <button class="details-button">More Details</button>
            </div>
        </div>

        <div class="movie-card">
            <img src="assets/joker.webp" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">Joker</h3>
                <p class="director">Director: Todd Phillips</p>
                <p class="categories">Categories: Crime, Thriller</p>
                <button class="details-button">More Details</button>
            </div>
        </div>

        <div class="movie-card">
            <img src="assets/delibal.webp" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">Delibal</h3>
                <p class="director">Director: Ali Bilgin</p>
                <p class="categories">Categories: Drama, Romance</p>
                <button class="details-button">More Details</button>
            </div>
        </div>

        <div class="movie-card">
            <img src="assets/oppenheimer.jpg" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title">Oppenheimer</h3>
                <p class="director">Director: Christopher Nolan</p>
                <p class="categories">Categories: Docudrama, History</p>
                <button class="details-button">More Details</button>
            </div>
        </div>
    </div>  

    
    

</body>
</html>