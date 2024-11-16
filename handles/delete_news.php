<?php
include "../connection.php";

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $newsId = intval($_GET['id']);

    // Log to check if the ID is received properly
    file_put_contents('log.txt', 'Received ID: ' . $newsId . PHP_EOL, FILE_APPEND);

    $sql = "DELETE FROM news_articles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $newsId);
    
    if ($stmt->execute()) {
        $response = array("success" => true, "message" => "news deleted successfully.");
        echo json_encode($response);
        exit(); // Terminate script execution after sending JSON response
    } else {
        $response = array("success" => false, "error" => "Error deleting news: " . $stmt->error);
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
