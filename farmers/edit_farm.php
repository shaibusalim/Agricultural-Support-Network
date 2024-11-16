<?php
include "../connection.php";

// Check if farm_id is provided in the URL
if (isset($_GET['id'])) {
    $farmId = $_GET['id'];

    // Fetch tractor details based on tractor_id
    $sql = "SELECT * FROM farms WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $farmId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $farmDetails = $result->fetch_assoc();
    } else {
        // Redirect to the listing page if farm_id is not valid
        header("location: add_farm.php");
        exit();
    }
} else {
    // Redirect to the listing page if farm_id is not provided
    header("location: add_farm.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch updated data from the form
    $farmName = $_POST['farm_name'];
    $location = $_POST['location'];
    $farmSize = $_POST['farm_size'];
    $cropGrown = $_POST['crops_grown'];
    $livestock = $_POST['livestock'];
    // ... (Add other fields as needed)

    // Update tractor information in the database
    $updateQuery = "UPDATE farms SET farm_name = ?, location = ?, farm_size = ?, crops_grown = ?, livestock = ? WHERE id = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("ssissi", $farmName, $location, $farmSize, $cropGrown, $livestock, $farmId);

    if ($stmtUpdate->execute()) {
        // Redirect to the listing page after successful update
        header("location: add_farms.php");
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
    <title>Edit Farms</title>
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
    <!-- Your HTML content and form for editing farms details -->
    <h1>Edit Farms</h1>
    <form method="post" action="">
        <!-- Display existing farms details in the form -->
        <label for="brand">Farm Name:</label>
        <input type="text" name="farm_name" value="<?php echo $farmDetails['farm_name']; ?>" required>

        <label for="model">Location:</label>
        <input type="text" name="location" value="<?php echo $farmDetails['location']; ?>" required>

        <label for="year">Farm Size:</label>
        <input type="text" name="farm_size" value="<?php echo $farmDetails['farm_size']; ?>" required>

        <label for="horsepower">Crops Grown:</label>
        <input type="text" name="crops_grown" value="<?php echo $farmDetails['crops_grown']; ?>" required>

        <label for="description">livestock:</label>
        <textarea name="livestock"><?php echo $farmDetails['livestock']; ?></textarea>

        <!-- Add other form fields as needed -->

        <button type="submit">Update Farms</button>
    </form>

    <!-- Include your JavaScript scripts and other body elements here -->
</body>
</html>
