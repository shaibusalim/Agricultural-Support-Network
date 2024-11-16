<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_task'], $_POST['task_id'])) {
    $taskId = $_POST['task_id'];
    $updatedTaskName = $_POST['updated_task_name'];
    $updatedTaskDescription = $_POST['updated_task_description'];
    $updatedTaskDate = $_POST['updated_task_date'];
    $updatedTaskStatus = $_POST['updated_task_status']; 
 

    // Update the task in the database
    $sql = "UPDATE owner_tasks SET task_name = ?, task_description = ?, task_date = ?, task_status = ? WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $updatedTaskName, $updatedTaskDescription, $updatedTaskDate, $updatedTaskStatus, $taskId);

    if ($stmt->execute()) {
        header("Location: task-management.php");
    } else {
        echo "Error updating task: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

