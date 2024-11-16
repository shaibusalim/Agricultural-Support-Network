<?php
session_start();
include "../connection.php";

$currentDate = date("Y-m-d H:i:s");
$moverId = $_SESSION['mover_id'];

$sql = "SELECT * FROM mover_tasks WHERE mover_id = ? AND task_date > ? ORDER BY task_date";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $moverId, $currentDate);
$stmt->execute();
$result = $stmt->get_result();

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode($tasks);
$stmt->close();
$conn->close();
?>
