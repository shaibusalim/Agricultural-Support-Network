<?php
include "../connection.php";

// Check if machine_id is provided in the URL
if (isset($_GET['machine_id'])) {
    $machineId = $_GET['machine_id'];

    // Fetch tractor details based on tractor_id
    $sql = "SELECT * FROM mover_machines WHERE machine_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $machineId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $machineDetails = $result->fetch_assoc();
    } else {
        // Redirect to the listing page if mover_id is not valid
        header("location: add_mover.php");
        exit();
    }
} else {
    // Redirect to the listing page if 'mover_id is not provided
    header("location: add_mover.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch updated data from the form
    $machineName = $_POST['machine_name'];
    $description = $_POST['description'];
    $model = $_POST['model'];
    $year = $_POST['year_of_manufacture'];
    $capacity = $_POST['capacity'];
    $fuelType = $_POST['fuel_type'];
    $licensePlate = $_POST['license_plate'];
    // ... (Add other fields as needed)

    // Update mover machine information in the database
    $updateQuery = "UPDATE mover_machines SET machine_name = ?, description = ?, model = ?, year_of_manufacture = ?, capacity = ?, fuel_type = ?, license_plate = ? WHERE machine_id = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("sssssssi", $machineName, $description, $model, $year, $capacity, $fuelType, $licensePlate, $farmId);

    if ($stmtUpdate->execute()) {
        // Redirect to the listing page after successful update
        header("location: add_mover.php");
        exit();
    } else {
        // Handle update failure
        $updateError = "Failed to update Machine information.";
    }

    $stmtUpdate->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mover Machines</title>
    <!-- Include your CSS stylesheets and other head elements here -->

    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    font-weight: bold;
}

input, textarea {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <!-- Your HTML content and form for editing machines details -->
    <h1>Edit Mover Machines</h1>
    <form method="post" action="">
        <!-- Display existing machines details in the form -->
        <label for="brand">Machine Name:</label>
        <input type="text" name="machine_name" value="<?php echo $machineDetails['machine_name']; ?>" required>

        <label for="model">Description:</label>
        <input type="text" name="description" value="<?php echo $machineDetails['description']; ?>" required>

        <label for="year">Model:</label>
        <input type="text" name="model" value="<?php echo $machineDetails['model']; ?>" required>

        <label for="horsepower">Year of Manufacture:</label>
        <input type="text" name="year_of_manufacture" value="<?php echo $machineDetails['year_of_manufacture']; ?>" required>

        <label for="description">Capacity:</label>
        <textarea name="capacity"><?php echo $machineDetails['capacity']; ?></textarea>

        <label for="description">Fuel Type:</label>
        <textarea name="fuel_type"><?php echo $machineDetails['fuel_type']; ?></textarea>

        <label for="description">License Plate:</label>
        <textarea name="license_plate"><?php echo $machineDetails['license_plate']; ?></textarea>

        <!-- Add other form fields as needed -->

        <button type="submit">Update Machines</button>
    </form>

    <!-- Include your JavaScript scripts and other body elements here -->
</body>
</html>
