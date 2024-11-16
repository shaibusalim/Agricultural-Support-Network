<?php
session_start(); // Ensure session is started

// Check if user is logged in
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // Redirect to login page or handle unauthorized access
    header("Location: login-form.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "techie";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user information from the database
$loggedInUserName = $_SESSION['name'];

// Prepare and execute a query to retrieve user information based on the username
$stmt = $conn->prepare("SELECT * FROM `membership` WHERE `UserName` = ?");
$stmt->bind_param("s", $loggedInUserName);
$stmt->execute();
$result = $stmt->get_result();

// Fetch user details
if ($result->num_rows > 0) {
    $userDetails = $result->fetch_assoc();
    echo "<p>Username: " . $userDetails['UserName'] . "</p>";
    echo "<p>Email: " . $userDetails['Email'] . "</p>";
} else {
    echo "User details not found";
}
?>
