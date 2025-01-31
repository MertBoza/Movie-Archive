<?php 
session_start();
require_once 'database.php';
require_once 'movie.php';

$database = new Database();
$db = $database->getConnection();
$movie = new Movie($db);
$movies = $movie->getAllMovies();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/navLogo.jpg" type="image/x-icon">
    <script>
            function confirmDelete(movieId) {
        console.log("Delete button clicked for movie ID: " + movieId);
        if (confirm("Are you sure you want to delete this movie?")) {
            window.location.href = "deleteMovie.php?id=" + movieId;
        }
    }
    </script>
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

<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
    <button class="details-button" onclick="location.href='createMovie.php'">Create New Movie</button>
<?php endif; ?>

<div class="movie-cards-container">
    <?php foreach ($movies as $movie): ?>
        <div class="movie-card" style="position: relative;">
            <img src="<?php echo htmlspecialchars($movie['image_path'] ?? 'assets/default.jpg'); ?>" alt="Movie Image">
            <div class="movie-info">
                <h3 class="movie-title"><?php echo htmlspecialchars($movie['title']); ?></h3>
                <p class="director">Director: <?php echo htmlspecialchars($movie['director']); ?></p>
                <p class="categories">Categories: <?php echo htmlspecialchars($movie['categories']); ?></p>
                <button class="details-button">More Details</button>

                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                    <button class="delete-button" onclick="confirmDelete(<?php echo $movie['id']; ?>)">Delete</button>
                    <button class="edit-button" onclick="location.href='editMovie.php?id=<?php echo $movie['id']; ?>'">Edit</button>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>


    <div class="slider-container">
        <div class="slider">
            <div class="slide"><img src="uploads/thePrestige.jpg" alt="Movie 1"></div>
            <div class="slide"><img src="uploads/inception.jpg" alt="Movie 2"></div>
            <div class="slide"><img src="uploads/joker.webp" alt="Movie 3"></div>
            <div class="slide"><img src="uploads/thePianist.jpg" alt="Movie 4"></div>
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>

</div>
</body>
</html>
