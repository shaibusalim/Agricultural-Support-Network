<?php
session_start();
include "../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update']) && isset($_POST['crop_id'])) {
    $cropId = $_POST['crop_id'];
    $growthStage = $_POST['growth_stage'];
    $treatments = $_POST['treatments'];
    $issues = $_POST['issues'];

    $sql = "UPDATE crops SET growth_stage = ?, treatments = ?, issues = ? WHERE crop_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $growthStage, $treatments, $issues, $cropId);

    if ($stmt->execute()) {
        echo "Record updated successfully";
        // Optionally redirect or perform other actions upon successful update
    } else {
        echo "Error in updating record: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Invalid request or crop ID not provided";
}

$conn->close();


?>