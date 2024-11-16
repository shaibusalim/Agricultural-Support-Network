<?php
include "../connection.php";

if (isset($_POST['add_details'])) {
    // Fetch additional details from the form
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $crop = $_POST['crop'];

    // Insert additional details into the farmers' table
    $query = "UPDATE `farmers` SET `firstname`=?, `lastname`=?, `address`=?, `location`=?, `crop`=? WHERE `username`=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $firstname, $lastname, $address, $location, $crop, $username);

    if ($stmt->execute()) {
        header("location: profile.php");
    } else {
        echo "Error adding additional details: " . $conn->error;
    }
}
?>
