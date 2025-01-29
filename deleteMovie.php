<?php
session_start();
require_once 'database.php';
require_once 'movie.php';

if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header("Location: home.php");
    exit();
}

if (isset($_GET['id'])) {
    $movieId = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();
    $movie = new Movie($db);

    if ($movie->delete($movieId)) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error deleting movie.";
    }
} else {
    echo "Movie ID not provided.";
}
?>
