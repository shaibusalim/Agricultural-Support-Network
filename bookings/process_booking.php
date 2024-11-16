<?php
session_start();
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the form
    $providerId = $_POST['providerId'];
    $providerType = $_POST['providerType'];
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['customerEmail'];
    $customerPhone = $_POST['customerPhone'];
    $bookingDate = $_POST['bookingDate'];
    $bookingTime = $_POST['bookingTime'];
    $additionalRequests = $_POST['additionalRequests'];
    $farmerId = $_SESSION['farmer_id'];

    // Insert data into bookings table
    $insertQuery = "INSERT INTO bookings (customer_name, customer_email, customer_phone, provider_id, provider_type, booking_date, booking_time, additional_requests, farmer_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssiisssi", $customerName, $customerEmail, $customerPhone, $providerId, $providerType, $bookingDate, $bookingTime, $additionalRequests, $farmerId);

    if ($stmt->execute()) {
        // Booking successful, now send a notification to the service provider
        $notification_text = "New booking initiated for your service.";
        
        // Capture booking information
        $booking_id = $conn->insert_id;  // Assuming booking_id is auto-incremented
        $booking_date = $_POST['bookingDate'];  // Adjust based on your form field name
        $booking_time = $_POST['bookingTime'];  // Adjust based on your form field name
    
        // Insert into tractor_owners_notifications
        $insertNotificationQuery = "INSERT INTO tractor_owners_notifications (owner_id, notification_text, booking_id, booking_date, booking_time, additional_requests) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsertNotification = $conn->prepare($insertNotificationQuery);
        $stmtInsertNotification->bind_param("ississ", $providerId, $notification_text, $booking_id, $booking_date, $booking_time, $additionalRequests);
    
        if ($stmtInsertNotification->execute()) {
            // Notification inserted successfully
            echo "<script>alert('Booking Successful. Notification sent to the service provider.')</script>";
            // Redirect or perform additional actions after successful booking
            // header("location: success-page.php");
        } else {
            // Handle the case where the insertion of notification fails
            echo "<script>alert('Booking Successful. Failed to send notification to the service provider.')</script>";
        }
    } else {
        echo "<script>alert('Failed to book. Please try again.')</script>";
        // Handle booking failure
    }
    

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
