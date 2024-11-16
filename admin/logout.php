<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

header("Location: ../lpage/index.php"); // Redirect to login page after logout
exit();
?>
