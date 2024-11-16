<?php
session_start();
include "../connection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && isset($_POST['machine_id'])){
    $machineId = $_POST['machine_id'];
    $date = $_POST['maintenance_date'];
    $mainType = $_POST['maintenance_type'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO mover_maintenance_records (machine_id, maintenance_date, maintenance_type, notes) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("isss", $machineId, $date, $mainType, $notes);

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
    echo "Invalid request or Machine ID not provided";
}



?>