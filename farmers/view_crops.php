<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crop Management</title>
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
</head>
<body>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="card-header">
                    <h5>List of Crops</h5>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-styling table-hover table-striped table-primary">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Crop Name</th>
                                    <th>Variety</th>
                                    <th>Planting Date</th>
                                    <th>Harvest Date</th>
                                    <th>acreage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../connection.php"; // Establish the database connection
                                if(isset($_SESSION['farmer_id'])){
                                    $farmerId = $_SESSION['farmer_id'];
    
                                
                                $sql = "SELECT * FROM crops WHERE farmer_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $farmerId);
                                $stmt->execute();
                                $result = $stmt->get_result();
    
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['crop_id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['variety'] . "</td>";
                                        echo "<td>" . $row['planting_date'] . "</td>";
                                        echo "<td>" . $row['harvest_date'] . "</td>";
                                        echo "<td>" . $row['acreage'] . "</td>";
                                        
                                       
                                        echo "<td>
                                        <a href='crop_management.php?crop_id=" . $row['crop_id'] . "' class='btn btn-primary btn-sm'>Manage</a>
                                              </td>";
                                       
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No records found</td></tr>";
                                }
    
                                $conn->close(); // Close the database connection
                            }else{
                                echo "crop owner not logged in";
                            }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
       

    <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="../libraries\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="../libraries\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="../libraries\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="../libraries\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../libraries\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../libraries\bower_components\modernizr\js\modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="../libraries\bower_components\chart.js\js\Chart.js"></script>
    <!-- amchart js -->
    <script src="../libraries\assets\pages\widget\amchart\amcharts.js"></script>
    <script src="../libraries\assets\pages\widget\amchart\serial.js"></script>
    <script src="../libraries\assets\pages\widget\amchart\light.js"></script>
    <script src="../libraries\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../libraries\assets\js\SmoothScroll.js"></script>
    <script src="../libraries\assets\js\pcoded.min.js"></script>
    <!-- custom js -->
    <script src="../libraries\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="../libraries\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="../libraries\assets\js\script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>