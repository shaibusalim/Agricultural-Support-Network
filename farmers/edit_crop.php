<?php
include "../connection.php";

// Check if crop_id is provided in the URL
if (isset($_GET['crop_id'])) {
    $cropId = $_GET['crop_id'];

    // Fetch crop details based on crop_id
    $sql = "SELECT * FROM crops WHERE crop_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cropId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $cropDetails = $result->fetch_assoc();
    } else {
        // Redirect to the listing page if crop_id is not valid
        header("location: add_crops.php");
        exit();
    }
} else {
    // Redirect to the listing page if crop_id is not provided
    header("location: add_crops.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch updated data from the form
    $name = $_POST['name'];
    $variety = $_POST['variety'];
    $plantingDate = $_POST['planting_date'];
    $harvestDate = $_POST['harvest_date'];
    $acreage = $_POST['acreage'];
    // ... (Add other fields as needed)

    // Update crop information in the database
    $updateQuery = "UPDATE crops SET name = ?, variety = ?, planting_date = ?, harvest_date = ?, acreage = ? WHERE crop_id = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("ssiiii", $name, $variety, $plantingDate, $harvestDate, $acreage, $cropId);

    if ($stmtUpdate->execute()) {
        // Redirect to the listing page after successful update
        header("location: add_crops.php");
        exit();
    } else {
        // Handle update failure
        $updateError = "Failed to update crop information.";
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
    <title>Edit Cropss</title>
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
    <!-- Your HTML content and form for editing crops details -->
    <h1>Edit Crops</h1>
    <form method="post" action="">
        <!-- Display existing farms details in the form -->
        <label for="brand">Crop Name:</label>
        <input type="text" name="name" value="<?php echo $cropDetails['name']; ?>" required>

        <label for="model">Variety:</label>
        <input type="text" name="variety" value="<?php echo $cropDetails['variety']; ?>" required>

        <label for="year">Planting Date:</label>
        <input type="text" name="planting_date" value="<?php echo $cropDetails['planting_date']; ?>" required>

        <label for="horsepower">Harvest Date:</label>
        <input type="text" name="harvest_date" value="<?php echo $cropDetails['harvest_date']; ?>" required>

        <label for="description">Acreage:</label>
        <textarea name="acreage"><?php echo $cropDetails['acreage']; ?></textarea>

        <!-- Add other form fields as needed -->

        <button type="submit">Update Crops</button>
    </form>

    <!-- Include your JavaScript scripts and other body elements here -->
</body>
</html>
