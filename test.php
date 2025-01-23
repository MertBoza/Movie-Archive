<?php
// Replace this with the admin's actual plain text password
$admin_plain_password = "mert"; 

// Rehash the password using PASSWORD_DEFAULT
$hashed_password = password_hash($admin_plain_password, PASSWORD_DEFAULT);

// Output the new hashed password (you can manually update this in the database)
echo $hashed_password;
?>
