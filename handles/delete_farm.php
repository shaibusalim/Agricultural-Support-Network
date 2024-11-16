<?php
include "../connection.php";

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $farmId = intval($_GET['id']);

    // Log to check if the ID is received properly
    file_put_contents('log.txt', 'Received ID: ' . $farmId . PHP_EOL, FILE_APPEND);

    $sql = "DELETE FROM farms WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $farmId);
    
    if ($stmt->execute()) {
        $response = array("success" => true, "message" => "Farm deleted successfully.");
        echo json_encode($response);
        exit(); // Terminate script execution after sending JSON response
    } else {
        $response = array("success" => false, "error" => "Error deleting farm: " . $stmt->error);
        echo json_encode($response);
        exit(); // Terminate script execution after sending JSON response
    }

    $stmt->close();
} else {
    $response = array("success" => false, "error" => "Invalid request.");
    echo json_encode($response);
    exit(); // Terminate script execution after sending JSON response
}
?>
