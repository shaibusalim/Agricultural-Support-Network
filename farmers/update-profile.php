<?php
include "../connection.php";

// Check if farmer is provided in the URL
if (isset($_GET['farmer_id'])) {
    $farmerId = $_GET['farmer_id'];

    // Fetch crop details based on farmer_id
    $sql = "SELECT * FROM farmers WHERE farmer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $farmerId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $farmerDetails = $result->fetch_assoc();
    } else {
        // Redirect to the listing page if farmer_id is not valid
        header("location: profile.php");
        exit();
    }
} else {
    // Redirect to the listing page if farmer_id is not provided
    header("location: profile.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch updated data from the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    // ... (Add other fields as needed)

    // Update farmer information in the database
    $updateQuery = "UPDATE farmers SET firstName = ?, lastName = ?, address = ?, phone = ?, location = ?, email = ? WHERE farmer_id = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("ssssssi", $firstName, $lastName, $address, $phone, $location, $email, $farmerId);

    if ($stmtUpdate->execute()) {
        // Redirect to the listing page after successful update
        header("location: profile.php");
        exit();
    } else {
        // Handle update failure
        $updateError = "Failed to update farmer information.";
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
    <title>Edit Farmer Details</title>
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
    <!-- Your HTML content and form for editing farmers details -->
    <h1>Edit Farmer Details</h1>
    <form method="post" action="">
        <!-- Display existing farmers details in the form -->
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo $farmerDetails['firstName']; ?>" required>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $farmerDetails['lastName']; ?>" required>

        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $farmerDetails['address']; ?>" required>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" value="<?php echo $farmerDetails['phone']; ?>" required>

        <label for="location">Location:</label>
        <textarea name="location"><?php echo $farmerDetails['location']; ?></textarea>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $farmerDetails['email']; ?>" required>

        <!-- Add other form fields as needed -->

        <button type="submit">Update Profile</button>
    </form>

    <!-- Include your JavaScript scripts and other body elements here -->
</body>
</html>
