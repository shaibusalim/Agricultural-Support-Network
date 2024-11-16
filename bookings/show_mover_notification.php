<?php
session_start(); // Ensure session is started

// Include your database connection file
include "../connection.php";

// Check if user is logged in
if (!isset($_SESSION['mover_id'])) {
    // Handle the case when the user is not logged in
    echo "User not logged in.";
    exit();
}


// Display notifications for  mover
$owner_id = $_SESSION['mover_id'];
$notificationsQuery = "SELECT ton.notification_id, ton.notification_text, ton.booking_id, ton.booking_date, ton.booking_time, ton.additional_requests, ton.is_confirmed
                       FROM mover_notifications ton
                       WHERE ton.mover_id = ? AND ton.is_confirmed = 0";
$stmtNotifications = $conn->prepare($notificationsQuery);
$stmtNotifications->bind_param("i", $owner_id);
$stmtNotifications->execute();
$resultNotifications = $stmtNotifications->get_result();


// Display notifications
while ($notification = $resultNotifications->fetch_assoc()) {
    echo "<div class='notification-container'>";
    echo "<p class='notification-text'>" . $notification['notification_text'] . "</p>";
    echo "<div class='booking-details'>";
    echo "<p><strong>Booking ID:</strong> " . $notification['booking_id'] . "</p>";
    echo "<p><strong>Date:</strong> " . $notification['booking_date'] . "</p>";
    echo "<p><strong>Time:</strong> " . $notification['booking_time'] . "</p>";
    echo "<p><strong>Additional Requests:</strong> " . $notification['additional_requests'] . "</p>";
    echo "</div>";
    echo "<p class='booking-status'><strong>Status:</strong> " . $notification['is_confirmed'] . "</p>";
    
    echo "<form method='post' action='confirm_booking.php'>";
    echo "<input type='hidden' name='notification_id' value='" . $notification['notification_id'] . "'>";
    echo "<input type='hidden' name='booking_id' value='" . $notification['booking_id'] . "'>";
    echo "<button type='submit' name='confirm_booking' class='confirmation-button' onclick='confirmBooking(" . $notification['notification_id'] . ", " . $notification['booking_id'] . ")'>Confirm Booking</button>";
    echo "</form>";
    
    echo "</div>";
    
}


// Handle booking confirmation
if (isset($_POST['confirm_booking'])) {
    $notification_id = $_POST['notification_id'];

    // Update the notification status to confirmed
    $updateQuery = "UPDATE mover_notifications SET is_confirmed = 'Confirmed by' WHERE notification_id = ?";
    $stmtUpdate = $conn->prepare($updateQuery);

    // Check if the statement is prepared successfully
    if (!$stmtUpdate) {
        echo "Error in preparing statement: " . $conn->error;
        exit();
    }

    $stmtUpdate->bind_param("i", $notification_id);
    $stmtUpdate->execute();

    // Update the booking status in your booking database table
    // You need to have a bookings table with a status column
    $updateBookingQuery = "UPDATE mover_bookings SET status = 'Confirmed' WHERE notification_id = ?";
    $stmtBookingUpdate = $conn->prepare($updateBookingQuery);

    // Check if the statement is prepared successfully
    if (!$stmtBookingUpdate) {
        echo "Error in preparing statement: " . $conn->error;
        exit();
    }

    $stmtBookingUpdate->bind_param("i", $notification_id);
    $stmtBookingUpdate->execute();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Notificatioin</title>
    <style>
        .notification-container {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
}

.notification-text {
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 10px;
}

.booking-details {
    margin-bottom: 10px;
}

.booking-status {
    font-weight: bold;
    margin-bottom: 10px;
}

.confirmation-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
}

</style>
</head>
<body>
    

<script>

function confirmBooking(notificationId, bookingId) {
    // Make an AJAX request to confirm the booking
    const url = 'confirm_mover_booking.php';
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            notification_id: notificationId,
            booking_id: bookingId,
        }),
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response, update the UI, etc.
        if(data.success){
            alert("Booking confirmed successfully!");
        }else{
            alert("Failed to confirm booking. Please try again.");
        }
    })
    .catch(error => console.error('Error:', error));
}

</script>
</body>
</html>