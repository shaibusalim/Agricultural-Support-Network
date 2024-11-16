
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .profile-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
        }

        .profile-image {
            margin-bottom: 20px;
        }

        .profile-image i {
            font-size: 5em;
            color: #333;
        }

        .profile-info p {
            margin: 8px 0;
            font-size: 16px;
            color: #333;
        }

        .profile-info p span {
            font-weight: bold;
            margin-right: 5px;
        }

        .profile-button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
        }

        .update-button {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #2ecc71;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
        }
        .profile-buttons{
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="profile-container">
        <div class="profile-image">
            <i class="fas fa-user-circle fa-5x"></i>
        </div>
        <div class="profile-info">
                            <?php
                    session_start();

                    include "../connection.php";
                    // Check if the session variable is set
                    if (isset($_SESSION['mover_id'])) {
                    

                        $moverId = $_SESSION['mover_id'];

                        // Fetch user profile information from the database
                        $query = "SELECT * FROM movers WHERE mover_id=?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $moverId);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();

                            // Display user profile information
                            echo "<p><span>Company Name:</span> " . $row['company_name'] . "</p>";
                            echo "<p><span>Name:</span> " . $row['contact_person'] . "</p>";
                            echo "<p><span> Email:</span> " . $row['email'] . "</p>";
                            echo "<p><span>Location:</span> " . $row['location'] . "</p>";
                            echo "<p><span>Phone Number:</span> " . $row['contact'] . "</p>";
                            echo "<p><span>Address:</span> " . $row['address'] . "</p>";
                            
                        } else{
                            echo "Please complete your profile.";
                        }
                    } else {
                        echo "User session not found.";
                    }
                    ?>
        </div>
        <div class="profile-buttons">
            <a href="add-profile.php" class="profile-button">Complete Profile</a>
            <a href="update-profile.php" class="update-button">Update Profile</a>
        </div>
</div>

<p>Please click <a href="mover-owner-dash.php">here<a/> to go back to your Dashboard</p>
</body>
</html>
