<?php
include "connection.php"; // Include your database connection script

// Get the provider ID from the request (e.g., via GET or POST)
$provider_id = $_GET['provider_id']; // Assuming you pass the provider_id via GET

// Retrieve ratings and feedback from the database
$selectQuery = "SELECT * FROM ratings WHERE provider_id = ?";
$stmt = $conn->prepare($selectQuery);
$stmt->bind_param("i", $provider_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch ratings and feedback
$ratings = array();
while ($row = $result->fetch_assoc()) {
    $ratings[] = $row;
}

// Close the database connection
$stmt->close();
$conn->close();

// Return the ratings and feedback as JSON
header('Content-Type: application/json');
echo json_encode($ratings);
?>
