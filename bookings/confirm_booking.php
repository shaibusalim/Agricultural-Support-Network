<?php

// Include your database connection file
include "../connection.php";

// Check if it's a POST request with JSON data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['CONTENT_TYPE'] === 'application/json') {
    // Decode JSON data from the request body
    $requestData = json_decode(file_get_contents('php://input'), true);

    // Check if notification_id and booking_id are provided
    if (isset($requestData['notification_id']) && isset($requestData['booking_id'])) {
        $notificationId = $requestData['notification_id'];
        $bookingId = $requestData['booking_id'];

        // Update the notification status to confirmed
        $updateNotificationQuery = "UPDATE tractor_owners_notifications SET is_confirmed = 'Confirmed' WHERE notification_id = ?";
        $stmtUpdateNotification = $conn->prepare($updateNotificationQuery);

        // Update the booking status to confirmed
        $updateBookingQuery = "UPDATE bookings SET status = 'Confirmed' WHERE booking_id = ?";
        $stmtUpdateBooking = $conn->prepare($updateBookingQuery);

        // Check if the statements are prepared successfully
        if ($stmtUpdateNotification && $stmtUpdateBooking) {
            $stmtUpdateNotification->bind_param("i", $notificationId);
            $stmtUpdateBooking->bind_param("i", $bookingId);

            // Execute the updates
            $stmtUpdateNotification->execute();
            $stmtUpdateBooking->execute();

            // Handle any additional logic or send a response if needed
            $response = array('success' => true);
            echo json_encode($response);
        } else {
            // Handle the case where the statement preparation fails
            $response = array('error' => 'Failed to prepare statement');
            echo json_encode($response);
        }
    } else {
        // Handle the case where notification_id or booking_id is not provided
        $response = array('error' => 'Notification ID or Booking ID not provided');
        echo json_encode($response);
    }
} else {
    // Handle the case where the request is not a valid POST request with JSON data
    $response = array('error' => 'Invalid request');
    echo json_encode($response);
}

// Close the database connection
$conn->close();

?>