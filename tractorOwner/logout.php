<?php
session_start(); // Ensure session is started

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a page after logout (if needed)
header("Location: index.php"); // Redirect to login page or any other page after logout
exit();
?>
