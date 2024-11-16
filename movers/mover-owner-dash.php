<?php
session_start();

include "../connection.php";

// Query to count mover owners
$querymoverOwners = "SELECT COUNT(*) AS moverOwnerCount FROM movers";
$resultmoverOwners = $conn->query($querymoverOwners);
$rowmoverOwners = $resultmoverOwners->fetch_assoc();
$moverOwnersCount = $rowmoverOwners['moverOwnerCount'];


// Query to count tractor 
$queryMachines = "SELECT COUNT(*) AS machinesCount FROM mover_machines";
$resultMachines = $conn->query($queryMachines);
$rowMachines = $resultMachines->fetch_assoc();
$machinesCount = $rowMachines['machinesCount'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mover Owners Dashboard</title>
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
     <!-- Material Icon -->
     <link rel="stylesheet" type="text/css" href="../libraries\assets\icon\material-design\css\material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <style>
            .first-section-list ul{
                    max-width:90%;
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    align-items: center;
                     height: 80px;
                     margin-bottom: 60px;
                  
            }
            .first-section-list ul li{ 
                width: 200px;
                height: 90px;
                text-align: center;
                padding:10px;
                margin-left:10px;
                margin-bottom: 10px;
                background-color: white;
                box-sizing: border-box;
                box-shadow: 5px 8px 10px 0 rgba(0, 0, 0, 0.3);
               
            }
            .first-section-list ul li a{
                font-size: 1.1rem;
                color: black;
            }
            .first-section-list ul li a:hover{
                color: black;
            }

            .first-section-list ul li:hover{
                background-color: white;
                color: black;
                cursor: pointer;
                transition: ease-in-out;
                transition-duration: 0.5s;
                width:210px;
                height: 100px;
            }
            .weat{
                margin-top:200px;
                
            }
            
           
          
        </style>
        
    </head>
<body>
      <!-- Pre-loader start -->
      <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                <!-- Begining of navbar-->
                        <?php include "mover-owner-nav.php"; ?>
                <!-- End of navbar-->
            </div>

            <!-- Sidebar inner chat end-->
         <div class="pcoded-main-container">
             <div class="pcoded-wrapper">
                   <!-- Sidebar Starts -->
                        <?php include "mover-owner-sidebar.php"; ?>
                   <!-- Sidebar Ends -->  

                   
             </div>

             <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        
                                        <div class="row"> 
                                            <!-- task, page, download counter  start -->
                                              <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-yellow update-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-end">
                                                            <div class="col-8">
                                                            <h4 class="text-white"> <?php echo $moverOwnersCount; ?></h4>
                                                                <h6 class="text-white m-b-0">Mover Owners</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <canvas id="update-chart-1" height="50"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-lite-green update-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-end">
                                                            <div class="col-8">
                                                                <h4 class="text-white">500</h4>
                                                                <h6 class="text-white m-b-0">Investors</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <canvas id="update-chart-1" height="50"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-lite-green update-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-end">
                                                            <div class="col-8">
                                                            <h4 class="text-white"> <?php echo $machinesCount; ?></h4>
                                                                <h6 class="text-white m-b-0">Movers</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <canvas id="update-chart-4" height="50"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="first-section-list">
                                                    <ul class="first-ulist">
                                                        <li>
                                                            <img src="../nimages/weather2.png" width="70" height="70">
                                                            <a href="../weather/index.html">Weather</a>
                                                         </li>
                                                        <li>
                                                        <img src="../nimages/market1.png" width="50" height="50">
                                                            <a href="../market/fertilizers.php">Market Place</a>
                                                        </li>
                                                        <li>
                                                        <img src="../nimages/micro2.png" width="50" height="50">
                                                            <a href="../article/articles-index.php">Article</a>
                                                        </li>
                                                        <li>
                                                        <img src="../nimages/ed.jpg" width="70" height="70">
                                                            <a href="../new/tech.php">Education</a>
                                                        </li>
                                                    </ul>
                                                </div>

                            </div>

        <!-- Main-body start -->
       

       


                        <div class="card">
                                     <div class="card-header">
                                         <h5>List of Movers</h5>
                                     </div>
                                        <div class="card-block table-border-style">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-styling table-hover table-striped table-primary">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Company Name</th>
                                                                                    <th>Location</th>
                                                                                    <th>Mobile Number</th>
                                                                                    <th>Email</th>
                                                                                    <th>Address</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
include "../connection.php";
// Fetch data from the '' table
$sql = "SELECT * FROM movers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['company_name']."</td>";
        echo "<td>".$row['location']."</td>";
        echo "<td>".$row['contact']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['address']."</td>";

        echo "</tr>";
    }
}
?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                            </div>
                                                    </div>
                  
                                                    
        <!-- Main-body start -->
        <div class="card">
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

                            $sql = "SELECT * FROM mover_machines";
                            $result = $conn->query($sql);

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
                                    
                            
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No records found</td></tr>";
                            }

                            $conn->close(); // Close the database connection
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

                           






                        </div>
                    </div>
              </div>
         </div>
     </div>

                            
                          
                   
  





          <!-- Custom Table color with hover and stripped table end -->
 
                                      


<script src="notification_script.js"></script>
<script src="script.js"></script>
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