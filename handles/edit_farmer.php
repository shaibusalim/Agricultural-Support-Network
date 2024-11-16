<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $farmerId = $_GET['id'];

    // Fetch the farmer's data based on the ID
    $sql = "SELECT * FROM farmers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $farmerId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Here, you can create a form with pre-filled data for editing
        // For example:
        ?>
        <form action="update_farmer.php" method="post">
            <input type="hidden" name="farmerId" value="<?php echo $row['id']; ?>">
            <!-- Other form fields pre-filled with existing data -->
            <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>">
            <!-- Other input fields -->
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "No farmer found with the provided ID.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}
?>
