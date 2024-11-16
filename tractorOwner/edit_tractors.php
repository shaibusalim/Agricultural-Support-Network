<?php
include "../connection.php";

// Check if tractor_id is provided in the URL
if (isset($_GET['tractor_id'])) {
    $tractorId = $_GET['tractor_id'];

    // Fetch tractor details based on tractor_id
    $sql = "SELECT * FROM tractors WHERE tractor_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tractorId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $tractorDetails = $result->fetch_assoc();
    } else {
        // Redirect to the listing page if tractor_id is not valid
        header("location: add_tractor.php");
        exit();
    }
} else {
    // Redirect to the listing page if tractor_id is not provided
    header("location: add_tractor.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch updated data from the form
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $horsepower = $_POST['horsepower'];
    $description = $_POST['description'];
    $availability = $_POST['availability'];
    $condition = $_POST['conditions'];
    $utilization = $_POST['utilization'];
    // ... (Add other fields as needed)

    // Update tractor information in the database
    $updateQuery = "UPDATE tractors SET brand = ?, model = ?, year = ?, horsepower = ?, description = ?, availability = ?, conditions = ?, utilization = ? WHERE tractor_id = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("ssisssssi", $brand, $model, $year, $horsepower, $description, $availability, $condition, $utilization, $tractorId);

    if ($stmtUpdate->execute()) {
        // Redirect to the listing page after successful update
        header("location: add_tractor.php");
        exit();
    } else {
        // Handle update failure
        $updateError = "Failed to update tractor information.";
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
    <title>Edit Tractor</title>
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
    <!-- Your HTML content and form for editing tractor details -->
    <h1>Edit Tractor</h1>
    <form method="post" action="">
        <!-- Display existing tractor details in the form -->
        <label for="brand">Brand:</label>
        <input type="text" name="brand" value="<?php echo $tractorDetails['brand']; ?>" required>

        <label for="model">Model:</label>
        <input type="text" name="model" value="<?php echo $tractorDetails['model']; ?>" required>

        <label for="year">Year:</label>
        <input type="text" name="year" value="<?php echo $tractorDetails['year']; ?>" required>

        <label for="horsepower">Horsepower:</label>
        <input type="text" name="horsepower" value="<?php echo $tractorDetails['horsepower']; ?>" required>

        <label for="description">Description:</label>
        <textarea name="description"><?php echo $tractorDetails['description']; ?></textarea>

        <label for="availability">Availability:</label>
        <textarea name="availability"><?php echo $tractorDetails['availability']; ?></textarea>

        <label for="condition">Condition:</label>
        <textarea name="conditions"><?php echo $tractorDetails['conditions']; ?></textarea>

        <label for="utilization">Utilization:</label>
        <textarea name="utilization"><?php echo $tractorDetails['utilization']; ?></textarea>

        <!-- Add other form fields as needed -->

        <button type="submit">Update Tractor</button>
    </form>

    <!-- Include your JavaScript scripts and other body elements here -->
</body>
</html>
