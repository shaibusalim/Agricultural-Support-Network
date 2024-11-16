<?php
include "../connection.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION['farmer_id'])) {
    echo "User not logged in.";
    exit();
}

// Fetch user details from the users table
$farmerId = $_SESSION['farmer_id'];
$userQuery = "SELECT * FROM farmers WHERE farmer_id = ?";
$stmtUser = $conn->prepare($userQuery);
$stmtUser->bind_param("i", $farmerId);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();

// Check if user exists
if ($resultUser->num_rows > 0) {
    $user = $resultUser->fetch_assoc();
    $username = $user['username'];
    // Fetch user's bookings from the bookings table
    $bookingsQuery = "SELECT * FROM bookings WHERE  farmer_id = ?";
    $stmtBookings = $conn->prepare($bookingsQuery);
    $stmtBookings->bind_param("i", $farmerId);
    $stmtBookings->execute();
    $resultBookings = $stmtBookings->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
</head>
<body>
    <h1>Your Bookings</h1>
    <table border="1">
        <tr>
            <th>Booking ID</th>
            <th>Provider ID</th>
            <th>Provider Type</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
        <?php
            while ($booking = $resultBookings->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $booking['booking_id'] . "</td>";
                echo "<td>" . $booking['provider_id'] . "</td>";
                echo "<td>" . $booking['provider_type'] . "</td>";
                echo "<td>" . $booking['booking_date'] . "</td>";
                echo "<td>" . $booking['booking_time'] . "</td>";
                echo "<td>" . $booking['status'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
<?php
} else {
    echo "User not found.";
}
?>
