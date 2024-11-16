<?php
session_start();
include "../connection.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['mover_id'])) {
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];
    $taskDate = $_POST['task_date'];
    $moverId = $_SESSION['mover_id']; // Assuming you have a user session
    echo "Mover ID: " . $_SESSION['mover_id'];

    if(isset($moverId)){
    $sql = "INSERT INTO mover_tasks (task_name, task_description, task_date, mover_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $taskName, $taskDescription, $taskDate, $moverId);

    if ($stmt->execute()) {
        echo "Task scheduled successfully";
    } else {
        echo "Error scheduling task: " . $stmt->error;
    }

    $stmt->close();

}else{
    echo "Mover Id is not set in the session";
}
$conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="date"] {
            /* Adjust the appearance of the date input if needed */
            appearance: none;
            -webkit-appearance: none;
            width: calc(100% - 2px);
            padding: 8px 0;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .task-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .task-container h3 {
            margin-bottom: 8px;
            font-weight: bold;
            color: #007bff;
        }

        .task-container p {
            margin-bottom: 12px;
        }

        .task-container form {
            display: inline-block;
        }

        .task-container button {
            background-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .task-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="task-management.php" method="post">

        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" required>
        
        <label for="task_description">Task Description:</label>
        <textarea name="task_description"></textarea>
        
        <label for="task_date">Task Date:</label>
        <input type="date" name="task_date" required>
    
        <input type="submit" value="Schedule Task">
    </form>

    <br><br>


    <?php
include "../connection.php"; // Include your database connection file


if(isset($_SESSION['mover_id'])){
    $moverId = $_SESSION['mover_id']; 

$sql = "SELECT * FROM mover_tasks WHERE mover_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $moverId);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='task-container'>";
        echo "<h3>" . $row['task_name'] . "</h3>";
        echo "<p>Date: " . $row['task_date'] . "</p>";
        echo "<p>Description: " . $row['task_description'] . "</p>";
        echo "<p>Status: " . $row['task_status'] . "</p>";
        echo "<form action='update_task.php' method='post'>";
        echo "<input type='hidden' name='task_id' value='" . $row['task_id'] . "'>";
        echo "<button type='submit' name='update_task'>Update</button>";
        echo "</form>";
        echo "</div>";
        // Inside the while loop for displaying tasks


// In update_task.php, handle the form submission to update task status

    }
} else {
    echo "No tasks scheduled.";
}

$stmt->close();
$conn->close();
}else{
    echo "Mover id not found";
}


  ?>  



</body>
</html>