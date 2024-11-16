<?php
session_start();
include "../connection.php";

if (!isset($_SESSION['owner_id'])) {
    echo "User not logged in.";
    exit();
}

$owner_id = $_SESSION['owner_id'];
$fetchNotificationsQuery = "SELECT notification_id, notification_text, is_confirmed FROM tractor_owners_notifications WHERE owner_id = ? AND is_confirmed = 0";
$stmtFetchNotifications = $conn->prepare($fetchNotificationsQuery);
$stmtFetchNotifications->bind_param("i", $owner_id);
$stmtFetchNotifications->execute();
$resultFetchNotifications = $stmtFetchNotifications->get_result();

$notifications = [];
while ($notification = $resultFetchNotifications->fetch_assoc()) {
    $notifications[] = $notification;
}

echo json_encode($notifications);
?>
