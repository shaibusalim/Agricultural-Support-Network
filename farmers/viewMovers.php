<?php
include "../connection.php";

// Fetch available tractor owners with tractors
$queryMovers = "SELECT m.*, mm.*
                FROM movers m
                JOIN mover_machines mm ON m.mover_id = mm.mover_id";

$resultMovers = $conn->query($queryMovers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Available Mover Machine Owners</title>
    <!-- Add your styles or include a stylesheet here -->
    <style>
        /* Add this style to your existing CSS or create a new CSS file */
/* Add this style to your existing CSS or create a new CSS file */
.main{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}
h2{
    text-align: center;
}
/* Style for the container */
div.mover-container {
    border: 1px solid #ddd;
    padding: 15px;
    margin: 20px;
    width: 20%;
}

/* Style for each card */
div.mover-card {
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Style for the tractor owner heading */
h3.mover-owner {
    color: #007bff;
    margin-bottom: 10px;
}

/* Style for the tractor information */
p.machine-info {
    margin-bottom: 10px;
}

/* Style for the tractor image */
img.machine-image {
    max-width: 100%;
    margin-bottom: 10px;
}

/* Style for the Book Now button */
button.book-now {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#bookingModal {
    display: none; /* Hide the modal by default */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    position: relative;
}

/* Style for the form inside the modal */
#bookingForm {
    display: grid;
    gap: 10px;
}

/* Style for form labels */
label {
    font-weight: bold;
}

/* Style for form inputs */
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="date"],
input[type="time"],
textarea {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

/* Style for the submit button */
button[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Close button style */
.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    font-weight: bold;
    color: #333;
    cursor: pointer;
}


    </style>
</head>
<body>

<h2>Available Mover Machine</h2>
<div class="main">
<?php
if ($resultMovers->num_rows > 0) {
    while ($row = $resultMovers->fetch_assoc()) {
        echo "<div class='mover-container'>";
        echo "<div class='mover-card'>";
        echo "<h3 class='mover-owner'>Machine Owner: " . $row['username'] . "</h3>";
        echo "<p class='mover-info'>Mover Machine: " . $row['machine_name'] . "</p>";
   
        
        echo "<img src='" . $row['machine_image'] . "' alt='Machine Image' class='machine-image'>";
        // Display other information about the tractor
        echo "<p class='mover-info'>Model: " . $row['model'] . "</p>";
     
        echo "<button class='book-now' onclick='initiateBooking(" . $row['mover_id'] . ", \"Tractor Owner\")'>Book Now</button>";
        echo "</div>";
        echo "</div>";
        
        
    }
} else {
    echo "<p>No available machine owners found.</p>";
}
?>
</div>


<div id="bookingModal" class="modal">
    <div class="modal-content">
        <!-- Form for booking details -->
        <form id="bookingForm" action="../bookings/process_mover_booking.php" method="post">
            <!-- Hidden input fields to store provider information -->
            <input type="hidden" name="providerId" id="providerId">
            <input type="hidden" name="providerType" id="providerType">

        
            <label for="customerName">Your Name:</label>
    <input type="text" name="customerName" required>

    <label for="customerEmail">Your Email:</label>
    <input type="email" name="customerEmail" required>

    <label for="customerPhone">Your Phone Number:</label>
    <input type="tel" name="customerPhone" required>

    <!-- Booking Details -->
    <label for="bookingDate">Preferred Date:</label>
    <input type="date" name="bookingDate" required>

    <label for="bookingTime">Preferred Time:</label>
    <input type="time" name="bookingTime" required>

    <!-- Additional Details (customize based on your service) -->
    <label for="additionalRequests">Additional Requests:</label>
    <textarea name="additionalRequests"></textarea>

            <!-- Submit button to confirm the booking -->
            <button type="submit">Book Now</button>
        </form>
        

        <!-- Close button for the modal -->
        <span class="close" onclick="closeModal()">&times;</span>
    </div>
</div>

<script>
    function initiateBooking(providerId, providerType) {
    // Set the provider information in the form
    document.getElementById('providerId').value = providerId;
    document.getElementById('providerType').value = providerType;

    // Open the booking modal
    openModal();
}

// Add this function to open the modal
function openModal() {
    var modal = document.getElementById('bookingModal');
    modal.style.display = 'block';
}

// Add this function to close the modal
function closeModal() {
    var modal = document.getElementById('bookingModal');
    modal.style.display = 'none';
}

</script>

</body>
</html>
