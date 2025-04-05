<?php
// Start the session
session_start();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page (or homepage)
header("Location: login.php"); // You can change this to your desired page
exit();
?>