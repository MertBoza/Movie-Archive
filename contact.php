<?php
session_start();
require_once 'database.php';
require_once 'ContactT.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $messageContent = $_POST['message'] ?? '';

    if (empty($name) || empty($surname) || empty($email) || empty($phone) || empty($messageContent)) {
        $message = 'All fields are required.';
    } else {
        $database = new Database();
        $db = $database->getConnection();

        $contact = new ContactT($db);

        if ($contact->save($name, $surname, $email, $phone, $messageContent)) {
            $message = 'Your message has been successfully sent!';
        } else {
            $message = 'There was an error sending your message. Please try again.';
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
    <script src="assets/script.js"></script>
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

    <div class="contact-container">
        <h2 class="contact-title">Contact Us</h2>

        <form method="post" class="contact-form">
            <label for="name" class="contact-label">Name</label>
            <input type="text" id="name" name="name" class="contact-input">
            <p id="name-error" class="error-message" style="display: none;"></p>
            
            <label for="surname" class="contact-label">Surname</label>
            <input type="text" id="surname" name="surname" class="contact-input">
            <p id="surname-error" class="error-message" style="display: none;"></p>
            
            <label for="email" class="contact-label">Email</label>
            <input type="email" id="email" name="email" class="contact-input">
            <p id="email-error" class="error-message" style="display: none;"></p>
            
            <label for="phone" class="contact-label">Phone Number</label>
            <input type="number" id="phone" name="phone" class="contact-input">
            <p id="phone-error" class="error-message" style="display: none;"></p>
            
            <label for="message" class="contact-label">Message</label>
            <textarea id="message" name="message" class="contact-textarea" rows="4"></textarea>
            <p id="message-error" class="error-message" style="display: none;"></p>

            <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>

            <button type="submit" class="contact-button">Submit</button>
        </form>
    </div>
</body>
</html>
