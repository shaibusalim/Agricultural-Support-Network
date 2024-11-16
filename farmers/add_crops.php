<?php
session_start();
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $variety = $_POST['variety'];
    $planting_date = $_POST['planting_date'];
    $harvest_date = $_POST['harvest_date'];
    $acreage = $_POST['acreage'];
    $farmerId = $_SESSION['farmer_id'];
    // Add more fields as per your database structure

    // Insert crop details into 'crops' table
    $sql = "INSERT INTO crops (name, variety, planting_date, harvest_date, acreage, farmer_id) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdi", $name, $variety, $planting_date, $harvest_date, $acreage, $farmerId);

    if ($stmt->execute()) {
        $cropId = mysqli_insert_id($conn); 
        echo "New crop added successfully! Crop ID: " . $cropId;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Crop</title>
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

     <style>
        /* Style for the form container */
.styled-form {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    max-width: 300px;
}

/* Style for form groups (labels and inputs) */
.form-group {
    margin-bottom: 10px;
}

/* Style for labels */
label {
    font-weight: bold;
    color: #333;
}

/* Style for inputs */
input[type="text"],
input[type="date"],
input[type="number"] {
    padding: 5px;
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 14px;
    margin-top: 3px;
}

input[type="submit"] {
    padding: 8px 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>

<div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- Begining of navbar-->
                    <?php include 'farmers-dash-nav.php'; ?>
            <!-- End of navbar-->
              <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius" src="../libraries\assets\images\avatar-3.jpg" alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="../libraries\assets\images\avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="../libraries\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="../libraries\assets\images\avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="../libraries\assets\images\avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="../libraries\assets\images\avatar-3.jpg" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="../libraries\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
         <div class="pcoded-main-container">
             <div class="pcoded-wrapper">
                   <!-- Sidebar Starts -->
                        <?php include "farmers-dash-sidebar.php"; ?>
                   <!-- Sidebar Ends -->  
   
             <div class="pcoded-content mainContent">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                    <div class="card">
                            <div class="card-header">
                                <h5>Add New Crop</h5>
                            </div>

                            <form action="add_crops.php" method="post" class="styled-form">
    <div class="form-group">
        <label for="name">Crop Name:</label><br>
        <input type="text" id="name" name="name" required><br>
    </div>
    
    <div class="form-group">
        <label for="variety">Variety:</label><br>
        <input type="text" id="variety" name="variety"><br>
    </div>
    
    <div class="form-group">
        <label for="planting_date">Planting Date:</label><br>
        <input type="date" id="planting_date" name="planting_date" required><br>
    </div>
    
    <div class="form-group">
        <label for="harvest_date">Harvest Date:</label><br>
        <input type="date" id="harvest_date" name="harvest_date" required><br>
    </div>
    
    <div class="form-group">
        <label for="acreage">Acreage:</label><br>
        <input type="number" id="acreage" name="acreage" step="0.01" required><br>
    </div>
    
    <!-- Add more fields for growth stage, issues, treatments, etc. as needed -->
    
    <input type="submit" value="Add Crop">
</form>




                        </div>
                                     </div>
                            </div>
                        </div>
                    </div>
         </div>

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
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['variety'] . "</td>";
                                    echo "<td>" . $row['planting_date'] . "</td>";
                                    echo "<td>" . $row['harvest_date'] . "</td>";
                                    echo "<td>" . $row['acreage'] . "</td>";
                                    
                                   
                                    echo "<td>
                                    <a href='edit_crop.php?crop_id=" . $row['crop_id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                    <button onclick='deleteCrop(" . $row['crop_id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
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
   
                        <div class="card">
                            <div class="card-header">
                                <h5>Crop Details</h5>
                            </div>
                       

                        </div>

   

    <!-- Custom Table color with hover and stripped table end -->
   
                    </div>  
            </div>                  
     </div>
 </div>
          <!-- task, page, download counter  end -->


          <script>

function deleteCrop(crop_id) {
    if (confirm("Are you sure you want to delete this farmer?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    } catch (error) {
                        console.error("Error parsing JSON:", error);
                        console.error(xhr.responseText); // Log the response for debugging
                    }
                } else {
                    console.error("XHR request failed:", xhr.status);
                    console.error(xhr.responseText); // Log the response for debugging
                }
            }
        };
        xhr.open("GET", "delete_crop.php?crop_id=" + crop_id, true);
        xhr.send();
    }
}

</script>

      
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
