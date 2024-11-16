<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="../libraries\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../libraries\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="../libraries\assets\icon\feather\css\feather.css">
     <!-- Font Awesome -->
     <link rel="stylesheet" type="text/css" href="../libraries\assets\icon\font-awesome\css\font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\jquery.mCustomScrollbar.css">
     <!-- Material Icon -->
     <link rel="stylesheet" type="text/css" href="../libraries\assets\icon\material-design\css\material-design-iconic-font.min.css">
    <title>Mover Machine Management</title>
</head>
<body>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="card-header">
                <h5>List of Mover Machine</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-styling table-hover table-striped table-primary">
                        <thead>
                            <tr>
                           
                            <th>Machine Name</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Capacity</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Fuel Type</th>
                            <th>License Plate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../connection.php"; // Establish the database connection

                            if(isset($_SESSION['mover_id'])){
                                $moverId = $_SESSION['mover_id'];

                                if (!is_numeric($moverId)) {
                                    echo "Invalid mover ID";
                                    exit(); // Stop execution to avoid potential issues
                                }


                                $sql = "SELECT * FROM mover_machines WHERE mover_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $moverId); // Assuming owner_id is an integer
                                $stmt->execute();
                                $result = $stmt->get_result();
                            
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                   
                                    echo "<td>" . $row['machine_name'] . "</td>";
                                    echo "<td>" . $row['model'] . "</td>";
                                    echo "<td>" . $row['year_of_manufacture'] . "</td>";
                                    echo "<td>" . $row['capacity'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td><img src='" . $row['machine_image'] . "' alt='Tractor Image' width='100' height='100'></td>";
                                    echo "<td>" .$row['fuel_type'] . "</td>"; 
                                    echo "<td>" .$row['license_plate'] . "</td>"; 
                                   
                                   
                                    echo "<td>
                                            <a href='add-maintenance-rec.php?machine_id=".$row['machine_id']."' class='btn btn-primary btn-sm'>Maintenance Record</a>
                                          </td>";
                                   
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No records found</td></tr>";
                            }

                        $conn->close();
                            }else{
                                echo "Machine woner not logged in";
                            }
                         ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>