<?php
require_once 'database.php';
require_once 'Movie.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $director = $_POST['director'] ?? '';
    $categories = $_POST['categories'] ?? '';
    $image_path = null;

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $image_path = $target_dir . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            $message = 'Error uploading image.';
        }
    }

    if (empty($title) || empty($director) || empty($categories)) {
        $message = 'All fields except image are required.';
    } else {
        $database = new Database();
        $db = $database->getConnection();

        $movie = new Movie($db);

        if ($movie->create($title, $director, $categories, $image_path)) {
            $message = 'The movie has been successfully created!';
        } else {
            $message = 'There was an error adding the movie. Please try again.';
        }
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
    <title>Create Movie</title>
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

    <div class="contact-container">
        <h2 class="contact-title">Create New Movie</h2>

        <form method="post" enctype="multipart/form-data" class="contact-form">
    <label for="title" class="contact-label">Movie Title</label>
    <input type="text" id="title" name="title" class="contact-input">

    <label for="director" class="contact-label">Director</label>
    <input type="text" id="director" name="director" class="contact-input">

    <label for="categories" class="contact-label">Categories</label>
    <input type="text" id="categories" name="categories" class="contact-input" placeholder="e.g., Action, Drama">

    <label for="image" class="contact-label">Movie Image</label>
    <input type="file" id="image" name="image" class="contact-input">

    <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

    <button type="submit" class="contact-button">Add Movie</button>
</form>

    </div>
</body>
</html>
