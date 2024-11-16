<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_task'], $_POST['task_id'])) {
    $taskId = $_POST['task_id'];
  
    // Retrieve the task information from the database based on the task ID
    $sql = "SELECT * FROM owner_tasks WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $taskId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $taskData = $result->fetch_assoc();
        // Display the update form with pre-filled values
        displayUpdateForm($taskData);
    } else {
        echo "Task not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}

function displayUpdateForm($taskData)
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Task</title>
        <!-- Add your styles or include a stylesheet here -->
        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
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

        input, textarea, select {
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
    </style>
    </head>
    <body>

    <h2>Update Task</h2>

    <form action="process_update_task.php" method="post">
        <input type="hidden" name="task_id" value="<?php echo $taskData['task_id']; ?>">

        <label for="updated_task_name">Task Name:</label>
        <input type="text" name="updated_task_name" value="<?php echo $taskData['task_name']; ?>" required>

        <label for="updated_task_description">Task Description:</label>
        <textarea name="updated_task_description"><?php echo $taskData['task_description']; ?></textarea>

        <label for="updated_task_date">Task Date:</label>
        <input type="date" name="updated_task_date" value="<?php echo $taskData['task_date']; ?>" required>

        <label for="updated_task_status">Task Status:</label>
<select name="updated_task_status">
    <option value="Pending" <?php echo ($taskData['task_status'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
    <option value="Completed" <?php echo ($taskData['task_status'] === 'Completed') ? 'selected' : ''; ?>>Completed</option>
    <!-- Add more status options if needed -->
</select>
        <!-- Add more fields as needed -->

        <input type="submit" name="update_task" value="Update Task">
    </form>

    </body>
    </html>
    <?php
}
?>
