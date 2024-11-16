<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['farmer_id'])) {
    // Redirect or display an error message
    header("Location: login.php");
    exit();
}

// Validate and sanitize input data
$provider_id = $_POST['providerId']; // Assuming you pass the provider_id via POST
$rating = intval($_POST['rating']); // Convert rating to integer
$feedback = htmlspecialchars($_POST['feedback']); // Sanitize feedback

// Validate rating (for example, ensure it's a number between 1 and 5)
if ($rating < 1 || $rating > 5) {
    // Handle invalid rating
    // Redirect or display an error message
    header("Location: error.php");
    exit();
}

// Insert rating and feedback into the database
include "../connection.php"; // Include your database connection script

$farmer_id = $_SESSION['farmer_id']; // ID of the user submitting the rating

$insertQuery = "INSERT INTO ratings (user_id, provider_id, rating, feedback) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("iiis", $farmer_id, $provider_id, $rating, $feedback);
$stmt->execute();

// Check for errors and handle them if necessary

// Close the database connection
$stmt->close();
$conn->close();

// Redirect back to the relevant page
header("Location: provider_profile.php?id=" . $provider_id); // Redirect to the provider's profile page, adjust as needed
exit();
?>
