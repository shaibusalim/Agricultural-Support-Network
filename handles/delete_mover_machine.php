<?php
include "../connection.php";

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['machine_id'])) {
    $machineId = intval($_GET['machine_id']);

    // Log to check if the ID is received properly
    file_put_contents('log.txt', 'Received ID: ' . $machineId . PHP_EOL, FILE_APPEND);

    $sql = "DELETE FROM mover_machines WHERE machine_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $machineId);
    
    if ($stmt->execute()) {
        $response = array("success" => true, "message" => "Mover Machine deleted successfully.");
        echo json_encode($response);
        exit(); // Terminate script execution after sending JSON response
    } else {
        $response = array("success" => false, "error" => "Error deleting Mover Machine: " . $stmt->error);
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
