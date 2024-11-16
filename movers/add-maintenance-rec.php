<?php
session_start();

    // Your database connection
    include "../connection.php"; 

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['machine_id'])) {
        $machineId = $_GET['machine_id'];
        $moverId = $_SESSION['mover_id']; 
    
        
        $sql = "SELECT * FROM mover_machines WHERE machine_id = ? AND mover_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $machineId, $moverId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class='container'>";
            echo "<h1 class='tractor-title'>Machine Name: " . $row['machine_name'] . " " . $row['model'] . "</h1>";
            echo "<p class='tractor-info'>Year: " . $row['year_of_manufacture'] . "</p>";
            echo "<p class='tractor-info'>Description: " . $row['description'] . "</p>";
            echo "<p class='tractor-info'>Condition: " . $row['capacity'] . "</p>";
            // Display tractor image
            echo "<img src='" . $row['machine_image'] . "' alt='Machine Image' class='machine-image'>";
            echo "</div>";
            
            

        }else{
            echo "Machine details not found.";
        }
        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintencance record</title>

    <style>

        /* Style for tractor title */
.tractor-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

/* Style for label spans */
.label {
    font-weight: bold;
    color: #777;
    margin-right: 5px;
}

/* Style for tractor details paragraphs */
p {
    font-size: 16px;
    margin-bottom: 8px;
}

/* Style for tractor image */
.machine-image {
    width: 300px; /* Adjust the width as needed */
    height: auto; /* Maintain aspect ratio */
    display: block;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.container{
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 400px;
    height: 450px;
    box-sizing: border-box;
    box-shadow: 2px 10px 20px 0px rgba(0,0,0,0.4);
   
}

    form {       
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input[type="date"],
    input[type="text"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    textarea {
        height: 100px;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

   
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }





    </style>
</head>
<body>
<br><br>
        
<?php
         

         include "../connection.php";
         
         if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['machine_id'])) {
             $machineId = $_GET['machine_id'];
             $moverId = $_SESSION['mover_id']; // Assuming you need the farmer's ID
         
             // Fetch crop details based on the ID and farmer ID from the database
             $sql = "SELECT * FROM mover_machines WHERE machine_id = ? AND mover_id = ?";
             $stmt = $conn->prepare($sql);
             $stmt->bind_param("ii", $machineId, $moverId);
             $stmt->execute();
             $result = $stmt->get_result();
         
             if ($result->num_rows > 0) {
                 $row = $result->fetch_assoc();
                     
           
         
         
         
                 // Display crop details in a form for management
                 echo '<form action="update_maintenance.php" method="post">';
                 echo '<h1>Maintenance Records</h1>';
                 echo '<input type="hidden" name="machine_id" value="' . $machineId . '">';
         
                 echo '<label for="maintenance_dte">Maintenance Date:</label>';
                 echo '<input type="date" id="growth_stage" name="maintenance_date"><br>';
         
                 echo '<label for="maintenance_type">Maintenace Type:</label>';
                 echo '<input type="text" id="treatments" name="maintenance_type"><br>';
         
                 echo '<label for="notes">Notes:</label>';
                 echo '<textarea id="issues" name="notes"></textarea><br>';
         
                 echo '<input type="submit" name="submit" value="Submit">';
                 echo '</form>';
             } else {
                 echo "Mover Machine not found or unauthorized access.";
             }
         
             $stmt->close();
             $conn->close();
         } else {
             echo "Mover ID not provided or invalid request.";
         }
         ?>

<br><br>





<table>
    <thead>
        <tr>
            <th>Maintenance Date</th>
            <th>Maintenance Type</th>
            <th>Notes</th>
            <!-- Add more table headers as needed -->
        </tr>
    </thead>
    <tbody id="tractorTableBody">
        <!-- Table body content will be populated dynamically -->
        <?php

include "../connection.php";

// Check if the session variable is set

    if (isset($_GET['machine_id'])) {
       $machineId = $_GET['machine_id'];

        // Fetch maintenance details based on the record ID and tractor ID from the database
        $sql = "SELECT * FROM mover_maintenance_records WHERE machine_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $machineId);
        $stmt->execute();
       $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            // Generate table rows with updated information
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['maintenance_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['maintenance_type']) . "</td>";
                echo "<td>" . htmlspecialchars($row['notes']) . "</td>";
                // Add more table cells if needed
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }

        $conn->close();
    } else {
        echo "Record ID not provided or invalid request.";
    }

?>

    </tbody>
</table>


</body>
</html>










