<?php
session_start();
require_once 'database.php';
require_once 'movie.php';

if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit();
}

$database = new Database();
$db = $database->getConnection();
$movie = new Movie($db);

if (isset($_GET['id'])) {
    $movieId = $_GET['id'];
    $movieDetails = $movie->getMovieById($movieId);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $director = $_POST['director'];
        $categories = $_POST['categories'];
        $image_path = $_POST['image_path'];

        $movie->update($movieId, $title, $director, $categories, $image_path);

        header("Location: home.php");
        exit();
    }
} else {
    echo "Movie ID not provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Edit Movie</title>
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

    <div class="edit-container">
        <h2 class="edit-title">Edit Movie</h2>
        <form action="editMovie.php?id=<?php echo $movieId; ?>" method="POST" class="edit-form">
            <label for="title" class="edit-label">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($movieDetails['title']); ?>" class="edit-input" required>
            
            <label for="director" class="edit-label">Director:</label>
            <input type="text" name="director" id="director" value="<?php echo htmlspecialchars($movieDetails['director']); ?>" class="edit-input" required>
            
            <label for="categories" class="edit-label">Categories:</label>
            <input type="text" name="categories" id="categories" value="<?php echo htmlspecialchars($movieDetails['categories']); ?>" class="edit-input" required>
            
            <label for="image_path" class="edit-label">Image Path:</label>
            <input type="text" name="image_path" id="image_path" value="<?php echo htmlspecialchars($movieDetails['image_path']); ?>" class="edit-input" required>
            
            <button type="submit" class="edit-button">Update Movie</button>
        </form>
    </div>
</body>
</html>
