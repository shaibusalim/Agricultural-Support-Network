<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\jquery.mCustomScrollbar.css">
     <!-- Material Icon -->
     <link rel="stylesheet" type="text/css" href="../libraries\assets\icon\material-design\css\material-design-iconic-font.min.css">
    <title>Tractor Management</title>

</head>
<body>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="card-header">
                <h5>List of Tractors</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-styling table-hover table-striped table-primary">
                        <thead>
                            <tr>
                          
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Horsepower</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Condition</th>
                            <th>Availability</th>
                            <th>Utilization</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../connection.php"; // Establish the database connection

                            if(isset($_SESSION['owner_id'])){
                                $ownerId = $_SESSION['owner_id'];

                                $sql = "SELECT * FROM tractors WHERE owner_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $ownerId); // Assuming owner_id is an integer
                                $stmt->execute();
                                $result = $stmt->get_result();
                            
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                   
                                    echo "<td>" . $row['brand'] . "</td>";
                                    echo "<td>" . $row['model'] . "</td>";
                                    echo "<td>" . $row['year'] . "</td>";
                                    echo "<td>" . $row['horsepower'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td><img src='" . $row['image_url'] . "' alt='Tractor Image' width='100' height='100'></td>";
                                    echo "<td>" .$row['conditions'] . "</td>"; // Condition: You can replace this with actual condition data
                                    echo "<td>" .$row['availability'] . "</td>"; // Availability: You can replace this with actual availability data
                                    echo "<td>" .$row['utilization'] . "</td>"; // Utilization: You can replace this with actual utilization data
                                   
                                    echo "<td>
                                            <a href='add-maintenance-rec.php?tractor_id=".$row['tractor_id']."' class='btn btn-primary btn-sm'>Maintenance Records</a>
                                           
                                          </td>";
                                   
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No records found</td></tr>";
                            }

                        $conn->close();
                            }else{
                                echo "tractor woner not logged in";
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