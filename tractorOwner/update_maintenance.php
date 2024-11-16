<?php
session_start();
include "../connection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && isset($_POST['tractor_id'])){
    $tractorId = $_POST['tractor_id'];
    $date = $_POST['maintenance_date'];
    $mainType = $_POST['maintenance_type'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO maintenance_records (tractor_id, maintenance_date, maintenance_type, notes) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("isss", $tractorId, $date, $mainType, $notes);

        if ($stmt->execute()) {
            echo "New record inserted successfully";
        } else {
            echo "Error in inserting record: " . $conn->error;
        }
        
        $stmt->close();
    } else {
        echo "Prepare statement error: " . $conn->error;
    }
}else {
    echo "Invalid request or tractor ID not provided";
}



?>